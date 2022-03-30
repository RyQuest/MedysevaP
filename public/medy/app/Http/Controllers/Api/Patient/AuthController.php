<?php

namespace App\Http\Controllers\Api\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patients;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Config;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //
    
    public $token = true;
    
    public function __construct()
    {
        Config::set('jwt.user', Patients::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => Patients::class,
        ]]);
    }
    
    public function register(Request $request)
    {
 
         $validator = \Validator::make($request->all(), 
                      [ 
                      'name' => 'required',
                      'email' => 'required|unique:patientses,email',
                      'password' => 'required',   
                     ]);  
 
         if ($validator->fails()) {  
               return response()->json(['error'=>$validator->errors()], 401); 
            }   
        $user = new Patients();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_id = 0;
        $user->mr_number = rand('11111','99999');
        $user->cid = 0;
        $user->mmid = 0;
        $user->scan_id = 0;
        $user->save();
        $email = $request->email;
                $data = array('name'=>$request->name);
                Mail::send('regmail', $data, function($message) use ($email) {
                $message->to($email, 'Medyseva')->subject
                    ('Patient Registration mail');
                // $message->from('medyseva@gmail.com','Medyseva');
                });

        return response()->json([
            'status' => 1,
            'messag' => "User Registered successfully",
        ]);
        // if ($this->token) {
        //     return $this->login($request);
        // }
  
        // return response()->json([
        //     'success' => true,
        //     'data' => $user
        // ], Response::HTTP_OK);
    }

    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(), 
                      [ 
                      'email' => 'required|email',
                      'password' => 'required',   
                     ]);  
 
         if ($validator->fails()) {  
              return response()->json(['error'=>$validator->errors()], 401); 
            } 
        $input = $request->only('email', 'password');
        $jwt_token = null;
 
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Patients::where('email',$request->email)->first();
        
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
            'user' => $user,
        ]);
    }
    

    public function logout(Request $request)
    {
        // $this->validate($request, [
        //     'token' => 'required'
        // ]);
 
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
 
    public function getAuthUser(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate($request->token);
        return response()->json(['success' => true,'user' => $user]);
    }
    
    public function forgot_password(Request $request)
    {
        $credentials = request()->validate(['email' => 'required|email']);
        Password::sendResetLink($credentials);
        return response()->json(["msg" => 'Reset password link sent on your email id.']);
    }
    
    public function reset() {
        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required'
        ]);

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(["msg" => "Invalid token provided"], 400);
        }

        return response()->json(["msg" => "Password has been successfully changed"]);
    }
    
}
