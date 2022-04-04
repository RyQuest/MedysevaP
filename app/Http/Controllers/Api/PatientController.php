<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patients;
class PatientController extends Controller
{
    public function store(Request $request){
        \Log::info($request->all());
        try{
            $headerInfo = $request->header('api_key');
            if($headerInfo != "bd50beee-8d1a-46e3-8480-36d95f4a83fe"){
                return response(['status' => 0, 'msg' => 'Invalid api request']);
            }
            $validator = \Validator::make($request->all(),[
                    'name' =>'required',
                    'email' => 'required|email',
                    'cid' => 'required',
                    'mmid' => 'required',
                    'scan_id' => 'required',
                    'mobile' => 'min:10|max:10'
                    
            ]);
                
            if($validator->fails()){
                return response(['status' => 0, 'msg' => $validator->errors()]);
            }
                
            $patient = Patients::create([
                'user_id' => 0,
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'mr_number' => rand('11111','99999'),
                'sex' => $request->get('gender'),
                'dob' => $request->get('dob'),
                'mobile' => $request->get('mobile'),
                'weight' => $request->get('weight'),
                'religion' => $request->get('religion'),
                'occuptation' => $request->get('occuptation'),
                'present_address' => $request->get('present_address'),
                'permanent_address' => $request->get('permanent_address'),
                'cid' => $request->get('cid'),
                'mmid' => $request->get('mmid'),
                'scan_id' => $request->get('scan_id'),
                'role' => 'patient',
                'created_at' => date('Y-m-d H:i:s')
                
            ]);
            
            if($patient){
                return response(['status' => 1, 'msg' => 'Patient saved successfully']);
            }
            return response(['status' => 0, 'msg' => 'Opps! Something went wrong.Please try again']);
            
        } catch(\Exception $ex){
            return response(['status' => 0, 'msg' => $ex->getMessage()]);
        }
    }
    
    public function savePatient(Request $request){
        try{
                
            $params = $request->all();
            $params['bpMed'] = false;
            $params['subscription'] = true;
            $params['medHistory'] = false;
            
            // \Log::info($params);
            $client = new \GuzzleHttp\Client();
            $call = "https://dev-main.abhayparimitii.cloudns.asia/auth/user/register";
            $request = $client->post($call,[
            //  'headers' => ['Content-Type' => 'application/json'],
            'json' =>$params
        ]);
            $response =  json_decode($request->getBody()->getContents(),true);
            if($response['success']){
                return response(['status' => 1, 'msg' => $response]);   
            }
            return response(['status' => 0,'msg' => '']);
        } catch(\Exception $ex){
            return response(['status' => 0,'msg' => $ex->getMessage()]);
        }
    }
    
    public function gettotalscansfrommobile($mobile){
          try{
            $client = new \GuzzleHttp\Client();
            $call = "https://dev-main.abhayparimitii.cloudns.asia/user/gettotalscansfrommobile/".$mobile;
            $request = $client->get($call);
            $response =  json_decode($request->getBody()->getContents(),true);
            
            return response(['status' => 1, 'msg' => $response]);
        } catch(\Exception $ex){
            return response(['status' => 0,'msg' => $ex->getMessage()]);
        }
    }
    
    public function gethealthframefromscanidandCID($scan_id,$cid){
        try{
            // \Log::info($scan_id);
            // \Log::info($cid);
            $client = new \GuzzleHttp\Client();
            $call = "https://dev-main.abhayparimitii.cloudns.asia/userdata/gethealthframefromscanidandCID/".$scan_id."/".$cid;
            $request = $client->get($call);
            $response =  json_decode($request->getBody()->getContents(),true);
            
            return response(['status' => 1, 'data' => $response]);
        } catch(\Exception $ex){
            return response(['status' => 0,'msg' => $ex->getMessage()]);
        }
    }
}

?>