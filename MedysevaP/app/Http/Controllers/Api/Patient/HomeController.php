<?php

namespace App\Http\Controllers\Api\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Config;
use DB;

class HomeController extends Controller
{
  
  public $token = true;
    
    public function __construct()
    {
        Config::set('jwt.user', Patients::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => Patients::class,
        ]]);
    }
    
    public function profileUpdate(Request $request){
         $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
        ]);
        
        if($validator->fails()){
            // return response(['status' => 0, 'error' => $validator->errors()]);
             return response(['status' => 0, 'msg' => $validator->errors()->first()]);
        }
        $userid = JWTAuth::parseToken()->authenticate($request->token);
        $user = Patients::find($userid->id);
        $user->name = $request->name;
        $user->dob = $request->dob;
        $user->sex = $request->sex;
        $user->mobile = $request->mobile;
        if($user->save()){
            return response(['status' => 1,'msg' => 'Updated successfully','data' => $user]);   
        } else {
            return response(['status' => 0,'msg' => 'Something went wrong.Please try again']);
        }
    }
    
    public function appointments(Request $request){
        $user = JWTAuth::parseToken()->authenticate($request->token);
        $appnt = DB::table('appointments')->where('patient_id',$user->id)->get();
        return response()->json(['status' => 1,'user' => $appnt]);
    }
    
    public function changepass(Request $request){
         $userid = JWTAuth::parseToken()->authenticate($request->token);
         $validator = \Validator::make($request->all(),[
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required', 
            'new_confirm_password' => 'required|same:new_password',
        ]);
        
        if($validator->fails()){
            // return response(['status' => 0, 'error' => $validator->errors()]);
            return response(['status' => 0, 'msg' => $validator->errors()->first()]);
        }
        Patients::find($userid->id)->update(['password'=> Hash::make($request->new_password)]);
        return response()->json(['status' => 1,'msg' => 'Password change successfully.']);
    }
    
    
  
}
