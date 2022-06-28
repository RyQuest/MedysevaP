<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Educations;
use App\Models\UserKyc;
use App\Models\UserBank;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
                      'phone' => 'required',
                      'password' => 'required',
                     ]);

         if ($validator->fails()) {
            //   return response()->json(['error'=>$validator->errors()], 401);
            return response(['status' => 0, 'msg' => $validator->errors()->first()]);
            }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
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
                /* Mail::send('regmail', $data, function($message) use ($email) {
                $message->to($email, 'Medyseva')->subject
                    ('Doctor Registration mail');
                // $message->from('medyseva@gmail.com','Medyseva');
                });
 */
        return response()->json([
            'status' => 1,
            'user' => $user,
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

    public function addDrDegree( Request $request ){
         $validator = \Validator::make($request->all(),
         [
            'reg_no' => 'required',
            'degree_name' => 'required',
         ]);

        if ($validator->fails()) {
            return response(['status' => 0, 'msg' => $validator->errors()->first()]);
        }
            $user_id = $request->user_id;
            $user = User::find($request->user_id);
            $user->reg_no = $request->reg_no;
            $user->save();

            if(!empty($request->degree_name)){
                foreach($request->degree_name as $degree_value){
                    $edu = new Educations();
                    $edu->user_id = $user_id;
                    $edu->title = $degree_value;
                    $edu->save();
                }
            }

        return response()->json([
            'status' => 1,
            'msg' => "Degree added successfully",
        ]);
    }

    public function addDrKyc( Request $request ){
        $user_kyc = new  UserKyc();
        $user_kyc = UserKyc::firstOrNew(array('user_id' => $request->user_id));
        $user_kyc->user_id                  = $request->user_id;
        $user_kyc->degree_cert          = $request->degree_cert;
        $user_kyc->registration_img = $request->registration_img;
        $user_kyc->aadhar_card          = $request->aadhar_card;
        $user_kyc->pan_card                = $request->pan_card;
        $user_kyc->passport_copy     = $request->passport_copy;
        $user_kyc->user_cv                  = $request->user_cv;
        $user_kyc->status                   = 1 ;
        $res = $user_kyc->save();

        // add Dr. Bank
        // $user_bank = new UserBank();
        $user_bank = UserBank::firstOrNew(array('user_id' => $request->user_id));
        $user_bank->user_id = $request->user_id;
        $user_bank->name = $request->user_name;
        $user_bank->bank_name = $request->bank_name;
        $user_bank->branch = $request->branch;
        $user_bank->account_no = $request->account_no;
        $user_bank->ifsc_code = $request->ifsc_code;
        $res = $user_bank->save();


        return response()->json([
            'status' => 1,
            'data' => $user_kyc,
            'msg' => "Degree added successfully",
        ]);
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

    public function forgot_password(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'email' => 'required',
        ]);

        if($validator->fails()){
             return response(['status' => 0, 'msg' => $validator->errors()->first()]);
        }

        $user = User::where('email',$request->email)->first();
        if($user){
            $password = mt_rand(10000000,99999999);
            $user->password = Hash::make($password);
            $user->save();
            $email = $request->email;
            $data = array(
                // 'name'=>$request->name,
                'password'=>$password,
            );
            Mail::send('emails/passwordreset', $data, function($message) use($email) {
                $message->to($email, 'Medyseva')->subject('Medyseva Reset Passwoed');
                $message->from('Medyseva@gmail.com','Medyseva');
            });
            return response()->json(['status' => 1,"msg" => 'New password is sent on your email id.']);
        }else{
            return response()->json(['status' => 0,"msg" => 'User not found']);
        }


    }

    public function addTempImg(Request $request){
        $user_id = $request->user_id;
        $user_photo = '';

        if($request->hasFile('photo')){
            // $user_photo = $request->file('photo')->store( 'temp', 'public' );
            // $user_photo = $request->file('photo')->store( 'users/kyc', 'public' );
            $path = Storage::putFile('public/users/kyc', $request->file('photo'));
        }

        DB::table('temp_img')->insert([
            'user_id' => $user_id,
            'temp_img' => $path,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return response()->json([
            'status' => 1,
             'temp_img' => $path,
            'msg' => "Temp image added successfully",
        ]);
    }
}
