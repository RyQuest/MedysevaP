<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Contact;
class CompanyController extends Controller
{
    //
    public function index(){
        $company = Company::all();
        return response(['status' => 1,'data' => $company]);
    }
    public function create(Request $request){
        $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'details' => 'required',
            'cin_no' => 'required'
        ]);
        
        if($validator->fails()){
            return response(['status' => 0, 'error' => $validator->errors()]);
        }
        Company::create([
            'name' => $request->get('name'),
            'details' => $request->get('details'),
            'cin_no' => $request->get('cin_no'),
            'uid' => uniqid(),
        ]);
        
        return response(['status' => 1,'msg' => 'Company created successfully']);
            
    }
    
     public function edit($id){
        $company = Company::find($id);
        return response(['status' => 1,'data' => $company]);
    }
    
    public function update(Request $request,$id){
         $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'details' => 'required',
            'cin_no' => 'required'
        ]);
        
        if($validator->fails()){
            return response(['status' => 0, 'error' => $validator->errors()]);
        }
        
        $company = Company::find($id);
        $company->name = $request->get('name');
        $company->details = $request->get('details');
        $company->cin_no = $request->get('cin_no');
        if($company->save()){
            return response(['status' => 1,'data' => $company]);   
        } else {
            return response(['status' => 0,'msg' => 'Something went wrong.Please try again']);
        }
    }
    
    public function deleteData($id){
        $company = Company::find($id);
        if($company->delete()){
            return response(['status' => 1,'msg' => 'Company deleted successfully']);   
        } else {
            return response(['status' => 0,'msg' => 'Something went wrong.Please try again']);
        }
    }
    
    public function getbyCIN($cin_no){
        $company = Company::where('cin_no',$cin_no)->first();
        if(null != $company){
            return response(['status' => 1,'data' => $company]);    
        }
        return response(['status' => 0,'msg' => 'Company not found.']);
    }

    public function contactUs(Request $request)
    {
        /*$validator = \Validator::make($request->all(), 
            [ 
                'doctor_name' => 'required',
                'doctor_specialization' => 'required',
                'doctor_number' => 'required', 
                'doctor_email' => 'required|email',

                'center_name' => 'required',
                'center_phone_num' => 'required', 
                'center_address' => 'required',
                'center_email' => 'required|email',
            ]);
 
         if ($validator->fails()) {  
               return response(['status' => 0, 'msg' => $validator->errors()->first()]);
            }  */ 
        $contact = new Contact();
        
        if($request->contactus_type == 'doctor'){
            $contact->doctor_name       = $request->doctor_name;
            $contact->doctor_specialization = $request->doctor_specialization;
            $contact->doctor_number     = $request->doctor_number;
            $contact->doctor_email      = $request->doctor_email;
        }else{
            $contact->center_name       = $request->center_name;
            $contact->center_phone_num  = $request->center_phone_num;
            $contact->center_address    = $request->center_address;
            $contact->center_email      = $request->center_email;
        }
        $contact->contactus_type  = $request->contactus_type;

        $contact->save();

        return response()->json([
            'status' => 1,
            'msg' => "submitted successfully",
        ]);
    }
}
