<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $post = $request->all();

        $patient_id = $post['patient_id'];
        $user_id = $post['user_id'];
        $appoinment_id = $post['appoinment_id'];
        $prescription_date  = date('Y-m-d H:i:s');


        $appointment = DB::table('appointments')->where('id', $appoinment_id)->orderBy('id', 'desc')->first();

        $data = array(

            'chamber_id' => $appointment->chamber_id,

            'patient_id' => $patient_id,

            'appointment_id' => $appointment->id,
            
            't' => $post['patiant_data']['temperature'],

            'p' => $post['patiant_data']['pulse_rate'],

            'r' => $post['patiant_data']['respiratory_rate'],

            'bp' => $post['patiant_data']['blood_pressure'],

            'ht' => $post['patiant_data']['height'],

            'wt' => $post['patiant_data']['weight'],
            
            'fbs' => $post['patiant_data']['fbs'],
            
            'rbs' => $post['patiant_data']['rbs'],
            
            'ppbs' => $post['patiant_data']['ppbs'],
            
            'blood_group' => $post['patiant_data']['blood_group'],

            'spo2' => $post['patiant_data']['spo2'],

            'chief_complains' => json_encode($post['patiant_data']['chief_complains']),

            'med_histry' => json_encode($post['patiant_data']['med_histry']),

            'allergies' => json_encode($post['patiant_data']['allergies']),

            'past_history' => json_encode($post['patiant_data']['past_history']),

            'personal_history' => json_encode($post['patiant_data']['personal_history']),

            'next_visit' => $post['next_duration'].' '.$post['next_time'].' later',

            'user_id' => $user_id,

            'created_at' => $prescription_date,
        );
            
        DB::beginTransaction();

        if($appointment->prescription_id == null){

            $prescription_id = DB::table('prescription')->insertGetId($data);

            if($prescription_id != 0){
                $app_data = array(
                    'prescription_id' => $prescription_id, 
                    // 'patient_id' => $patient_id,
                    'status' => 1
                );
                DB::table('appointments')->where('id', $appointment->id)->update($app_data);

                // add_prescription_items

                $this->add_prescription_items($prescription_id, $post);
            }

            DB::commit();

            $pre_query = DB::table('prescription');
            $pre_query->leftJoin('users', 'users.id', '=', 'prescription.user_id');
            $pre_query->leftJoin('chamber', 'chamber.uid', '=', 'prescription.chamber_id');
            $pre_query->where('prescription.id', $prescription_id);
            // $pre_query->select('prescription.*, users.name as user_name, users.degree,users.reg_no,users.phone, users.specialist, users.email, chamber.name as chamber_name, chamber.logo, chamber.title as chamber_title, chamber.address');
            $response['prescription'] = $pre_query->first();

            return response(['status' => 1,'data' => $response]);
        }else{
            return response(['status' => 1,'data' => [], 'msg' =>'already created prescription' ]);
        }

    }

    public function add_prescription_items($prescription_id, $post){
        DB::beginTransaction();
        // if prescription exist then delete old prescription enquiry data
        if ($prescription_id != 0) {
            DB::table('pre_diagonosis')->where('prescription_id', $prescription_id)->delete();
            DB::table('pre_ad_advices')->where('prescription_id', $prescription_id)->delete();
            DB::table('pre_advice')->where('prescription_id', $prescription_id)->delete();
            DB::table('pre_investigation')->where('prescription_id', $prescription_id)->delete();
            DB::table('prescription_items')->where('prescription_id', $prescription_id)->delete();
        }

        // Insert diagonosis data
        if(!empty($post['diagonosis'])):
            $i=0;
            foreach ($post['diagonosis'] as $value_1) {
                $data_1 = array(
                    'prescription_id' => $prescription_id,
                    'diagonosis_id' => $value_1,
                );
                $i++; 
                DB::table('pre_diagonosis')->insert($data_1);
            }
        endif; 

        // Insert ad_advices data
        if(!empty($post['ad_advices'])):
            $j=0;
            foreach ($post['ad_advices'] as $value_2) {
                $data_2 = array(
                    'prescription_id' => $prescription_id,
                    'ad_advices_id' => $value_2,
                );
                $j++; 
                DB::table('pre_ad_advices')->insert($data_2);
            }
        endif;

        // Insert advices data
        if(!empty($post['ad_advices'])):
            $k=0;
            foreach ($post['ad_advices'] as $value_3) {
                $data_3 = array(
                    'prescription_id' => $prescription_id,
                    'advice_id' => $value_3,
                );
                $k++;
                DB::table('pre_advice')->insert($data_3);
            }
        endif;        

        // Insert investigation data
        if(!empty($post['investigation'])):
            $l=0;
            $invoiceId = random_int(10000, 99999);
            $final_total = array();
            
            $appoinment_id =  $post['appoinment_id'];
            $app_data = DB::table('appointments')->where('id', $appoinment_id)->get();
             
            foreach ($post['investigation'] as $value_4) {

                $data_4 = array(
                    'prescription_id' => $prescription_id,
                    'investigation_id' => $value_4,
                );
                $l++;

                DB::table('pre_investigation')->insert($data_4);
            }
        endif;

        
        // add drugs data
        $prescription_info = DB::table('prescription')->where('id', $prescription_id)->first();

        foreach ($post['drugs'] as $key => $drug) {

            $data = array(
                'prescription_id'=>$prescription_id,
                'drug_id'       =>$drug['drug_id'],
                'doctor_id'     =>  $prescription_info->user_id,
                'patient_id'    =>  $prescription_info->patient_id,   
                'time_periods'  => !empty($drug['time_period']) ? $drug['time_period'] : '',
                'medicine_time' => !empty($drug['medicine_time']) ? $drug['medicine_time'] : '',
                'duration_text' =>!empty($drug['duration_text']) ? $drug['duration_text'] : '',
                'duration'  => !empty($drug['duration']) ? $drug['duration'] : '',
                'note'      => !empty($drug['note']) ? $drug['note'] : '',
                'created_at' => date('Y-m-d H:i:s'),
            );
            
            if(!empty($drug['time_periods']) || !empty($drug['medicine_time']) || !empty($drug['duration_text'])

             || !empty($drug['duration']) || !empty($drug['note'])):

                DB::table('prescription_items')->insert($data);
            endif;
        }

        DB::commit();

        return true;
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
        
        $query = DB::table('patientses');
        if( $limit != 0 or is_null($limit) ){
            $query->skip($offset);
            $query->take($limit);
        }
        $patientses = $query->get();
        
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

    public function diagnosisReports(Request $request){
        $patient_id = $request->input('patient_id');

        $diagnosis_reports = DB::table('diagnosis_reports')
                        ->where('patient_id', $patient_id)
                        ->get();
        if(!empty($diagnosis_reports)){
            return response(['status' => 1,'data' => $diagnosis_reports]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
}

?>