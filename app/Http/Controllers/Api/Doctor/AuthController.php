<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //
    
    public $token = true;
    
    public function __construct()
    {
        // $this->middleware('auth.jwt')->except('register','login','getState');
         $this->guard = "api";
    }
    
    public function register(Request $request)
    {
 
         $validator = \Validator::make($request->all(), 
                      [ 
                      'name' => 'required',
                      'email' => 'required|unique:users,email',
                      'password' => 'required',   
                     ]);  
 
         if ($validator->fails()) {  
            //   return response()->json(['error'=>$validator->errors()], 401); 
            return response(['status' => 0, 'msg' => $validator->errors()->first()]);
            }   
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->parent_id = 3;
        // $user->middleName = $request->middleName;
        // $user->weight = $request->weight;
        // $user->height = $request->height;
        // $user->medHistory = $request->medHistory;
        // $user->guest = $request->guest ?? 0;
        // $user->student = $request->student ?? 0;
        // $user->patient = $request->patient ?? 0;
        // $user->check = $request->check ?? 0;
        // $user->lastScanId = $request->lastScanId;
        // $user->ttl = $request->ttl;
        // $user->preScanCompleted = $request->preScanCompleted ?? 1;
        // $user->preScanId = $request->preScanId;
        // $user->postScanId = $request->postScanId;
        $user->save();
         $email = $request->email;
        $data = array('name'=>$request->name);
                Mail::send('regmail', $data, function($message) use ($email) {
                $message->to($email, 'Medyseva')->subject
                    ('Doctor Registration mail');
                // $message->from('medyseva@gmail.com','Medyseva');
                });

        return response()->json([
            'status' => 1,
            'msg' => "Registered successfully",
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
            //   return response()->json(['error'=>$validator->errors()], 401); 
            return response(['status' => 0, 'msg' => $validator->errors()->first()]);
            } 
        $input = $request->only('email', 'password');
        $jwt_token = null;
 
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => 0,
                'msg' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }
        
        $user = User::where('email',$request->email)->first();
        
        return response()->json([
            'status' => 1,
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
                'status' => 1,
                'msg' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'status' => 0,
                'msg' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
 
    public function getAuthUser(Request $request)
    {
        
        // $this->validate($request, [
        //     'token' => 'required'
        // ]);
 
        $user = JWTAuth::parseToken()->authenticate($request->token);
 
        return response()->json(['user' => $user]);
    }
    
    
    public function getuserbymobile($mobile)
    {
        // $this->validate($request, [
        //     'mobile' => 'required'
        // ]);

        $user = User::where('mobile',$mobile)->first();
        if($user){
            return response()->json([
                'status' => true,
                'user' =>  $user
                ]);
        }else{
            return response()->json([
                'status' => false,
                'error' =>  "User not found",
                ]);
        }
    }
    
    public function getuserbynfc($nfc)
    {
        // $this->validate($request, [
        //     'mobile' => 'required'
        // ]);

        $user = User::where('nfc',$nfc)->first();
        if($user){
            return response()->json([
                'status' => true,
                'user' =>  $user
                ]);
        }else{
            return response()->json([
                'status' => false,
                'error' =>  "User not found",
                ]);
        }
    }
}
