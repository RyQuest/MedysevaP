<?php

namespace App\Http\Controllers\Api\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patients;
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
            return response(['status' => 0, 'error' => $validator->errors()]);
        }
        $userid = JWTAuth::parseToken()->authenticate($request->token);
        $user = Patients::find($userid->id);
        $user->name = $request->name;
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
    
  
}
