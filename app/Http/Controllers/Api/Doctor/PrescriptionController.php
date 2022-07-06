<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Prescriptions;
use App\Models\User;

class PrescriptionController extends Controller
{
    /* get Prescriptions list data */
    public function index(Request $request){
        $data = [];
        $user_id  = $request->input('user_id');
        $offset  = $request->input('offset');
        $limit  = $request->input('limit');

        $prescriptions = Prescriptions::with(['chamber', 'patient'])
                        ->skip($offset)
                        ->take($limit)
                        ->orderBy('id', 'DESC')
                        ->get();

        $total_count = Prescriptions::count();

        if(!empty($prescriptions)){
            $data['prescriptions'] = $prescriptions;
            $data['total_count'] = $total_count;
            return response(['status' => 1,'data' => $data]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    

    /* get Prescriptions view data */
    public function view(Request $request){
        $data = [];
        $user_id  = $request->input('user_id');
        $prescription_id  = $request->input('prescription_id');

        $prescription = Prescriptions::with(['items', 'chamber', 'user', 'patient'])
                        ->where('id', $prescription_id)
                        ->first();

        if(!empty($prescription)){
            $data['prescription'] = $prescription;
            return response(['status' => 1,'data' => $data]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    /* update user profile */
    public function profileUpdate(Request $request){
        $user_id = $request->input('user_id');
        $user = User::where('id',$user_id)->first();
        if(!empty($user)){
            $user->name         = $request->input('name');
            $user->specialist   = $request->input('specialist');
            $user->degree       = $request->input('degree');
            $user->address      = $request->input('address');
            $user->skype        = $request->input('skype');
            $user->whatsapp     = $request->input('whatsapp');
            $user->phone        = $request->input('phone');
            $user->exp_years    = $request->input('exp_years');
            $user->about_me     = $request->input('about_me');
            $user->email        = $request->input('email');
            $user->facebook     = $request->input('facebook');
            $user->twitter      = $request->input('twitter');
            $user->linkedin     = $request->input('linkedin');
            $user->instagram    = $request->input('instagram');
            $user->enable_appointment = $request->input('enable_appointment');

            if($request->hasFile('photo')){
                $user_photo = $request->file('photo')->store('users','public');
                $user->image = $user_photo;
                $user->thumb = $user_photo;
            }

            $res = $user->save();
            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'User updation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    /* Create user education */
    public function educationAdd(Request $request){
        $user_id = $request->input('user_id');
        $user = User::where('id',$user_id)->first();
        if(!empty($user)){
            $education = new Educations;
            $education->user_id     = $request->input('user_id');
            $education->title       = $request->input('title');
            $education->years       = $request->input('from_years').'-'.$request->input('to_years');
            $education->details     = $request->input('details');
            $res = $education->save();

            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations Creation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
 
    /* Update User education */
    public function educationUpdate(Request $request){
        $user_id = $request->input('user_id');
        $edu_id  = $request->input('edu_id');
        $education = Educations::find($edu_id);
        if(!empty($education)){
            $education->user_id     = $request->input('user_id');
            $education->title       = $request->input('title');
            $education->years       = $request->input('from_years').'-'.$request->input('to_years');
            $education->details     = $request->input('details');
            $res = $education->save();

            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations updation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
 
    /* Delete User education */
    public function educationDelete(Request $request){
        $user_id = $request->input('user_id');
        $edu_id  = $request->input('edu_id');
        $education = Educations::find($edu_id);
        if(!empty($education)){
            $res = $education->delete();
            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations updation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    /* Create user experience */
    public function experienceAdd(Request $request){
        $user_id = $request->input('user_id');
        $user = User::where('id',$user_id)->first();
        if(!empty($user)){
            $experience = new Educations;
            $experience->user_id     = $request->input('user_id');
            $experience->title       = $request->input('title');
            $experience->years       = $request->input('from_years').'-'.$request->input('to_years');
            $experience->details     = $request->input('details');
            $res = $experience->save();

            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations Creation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
 
    /* Update User experience */
    public function experienceUpdate(Request $request){
        $user_id = $request->input('user_id');
        $exp_id  = $request->input('exp_id');
        $experience = Educations::find($exp_id);
        if(!empty($experience)){
            $experience->user_id     = $request->input('user_id');
            $experience->title       = $request->input('title');
            $experience->years       = $request->input('from_years').'-'.$request->input('to_years');
            $experience->details     = $request->input('details');
            $res = $experience->save();

            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations updation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
 
    /* Delete User experience */
    public function experienceDelete(Request $request){
        $user_id = $request->input('user_id');
        $exp_id  = $request->input('exp_id');
        $experience = Educations::find($exp_id);
        if(!empty($experience)){
            $res = $experience->delete();
            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations updation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }


    public function create(Request $request){
        dd($request->all());
        /*$user_id = $request->input('user_id');
        $user_role = $request->input('user_role');*/
        DB::beginTransaction();
        DB::commit();
    }
    
    public function diagonosis(Request $request){
        $user_id    = $request->input('user_id');
        $diagonosis = DB::table('diagonosis')->where('user_id', $user_id)->get();
        if(!empty($diagonosis)){
            return response(['status' => 1,'data' => $diagonosis]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    public function additionalAdvises(Request $request){
        $user_id    = $request->input('user_id');
        $add_advises = DB::table('additional_advises')->where('user_id', $user_id)->get();
        if(!empty($add_advises)){
            return response(['status' => 1,'data' => $add_advises]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    public function advises(Request $request){
        $user_id    = $request->input('user_id');
        $advises = DB::table('advises')->where('user_id', $user_id)->get();
        if(!empty($advises)){
            return response(['status' => 1,'data' => $advises]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    public function adviseInvestigations(Request $request){
        $user_id    = $request->input('user_id');
        $advise_investigations = DB::table('advise_investigations')->where('user_id', $user_id)->get();
        if(!empty($advise_investigations)){
            return response(['status' => 1,'data' => $advise_investigations]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    public function drugs(Request $request){
        $user_id    = $request->input('user_id');
        $drugs = DB::table('drugs')->where('user_id', $user_id)->get();
        if(!empty($drugs)){
            return response(['status' => 1,'data' => $drugs]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    public function patientses(Request $request){
        $user_id    = $request->input('user_id');
        $offset     = $request->input('offset');
        $limit      = $request->input('limit');
        
        $patientses = DB::table('patientses')
                        ->skip($offset)
                        ->take($limit)
                        ->get();
        if(!empty($patientses)){
            return response(['status' => 1,'data' => $patientses]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    public function patientsSearch(Request $request){
        $search_query    = $request->input('search_query');
        
        $patientses = DB::table('patientses')
                        ->where('name', 'like', '%'.$search_query.'%')
                        ->get();
        if(!empty($patientses)){
            return response(['status' => 1,'data' => $patientses]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }

    
    public function addDrug(Request $request){
        $user_id  = $request->input('user_id');
        $name     = $request->input('name');
        $details  = $request->input('details');

        $drug = DB::table('drugs')->insert([
            'user_id' => $user_id,
            'name'    => $name,
            'details' => $details,
        ]);
        if(!empty($drug)){
            return response(['status' => 1,'data' => $drug]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }

    public function patientPrescriptions(Request $request){
        $data = [];
        $user_id    = $request->input('user_id');
        $patient_id = $request->input('patient_id');
        $offset     = $request->input('offset');
        $limit      = $request->input('limit');

        $prescriptions = Prescriptions::with(['chamber', 'patient'])
                        ->where('user_id', $user_id)
                        ->where('patient_id', $patient_id)
                        ->skip($offset)
                        ->take($limit)
                        ->orderBy('id', 'DESC')
                        ->get();


        if(!empty($prescriptions)){
            return response(['status' => 1,'data' => $prescriptions]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
}

?>