<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\User;

class DoctorController extends Controller
{
    /* get all appoinments data */
    public function appointments(Request $request){
        
         $user_id     = $request->input('user_id');
        $chamber_uid = $request->input('chamber_uid');
        $offset      = $request->input('offset');
        $limit       = $request->input('limit');
        
        $user = User::find($user_id);

        $dr_query = DB::table('appointments');
        // $dr_query->leftJoin('patientses', 'patientses.id', '=', 'appointments.patient_id');

        if($user->chamber_id > 0)        {
            $dr_query->where('chamber_id',$chamber_uid);
        }

        /*if($user->doctor_type == "0"){
            $dr_query->where('appointment_type',"1");
        } else if($user->doctor_type == "1"){
            $dr_query->where('user_id', $user->id);
        }*/

        // $dr_query->orderBy('date', 'ASC');
        $dr_query->orderBy('serial_id', 'desc');

        $dr_query->skip($offset);
        $dr_query->take($limit);

        $appointments = $dr_query->get();

        foreach ($appointments as $key => $value) {

            $appointments[$key]->patient = DB::table('patientses')->where('id', $value->patient_id)->first();
            $appointments[$key]->chamber = DB::table('chamber')->where('uid', $value->chamber_id)->first();

            $query2 = DB::table('prescription as p');
            $query2->where('p.patient_id', $value->patient_id);
            $query2->where(DB::raw("(DATE_FORMAT(p.created_at,'%Y-%m-%d'))"), $value->date);
            $appointments[$key]->is_done = $query2->count();

            // User Payment status
            $query3 = DB::table('payment_user');
            $query3->where('user_id', $value->user_id);
            $query3->where('appointment_id', $value->id);
            $payment = $query3->first();
            if (empty($payment)) {
                $appointments[$key]->payment_status = 0;
            } else {
                if ($payment->status == 'verified') {
                    $appointments[$key]->payment_status = 1;
                } else {
                    $appointments[$key]->payment_status = 0;
                }
            }
        }

        if(!empty($appointments)){
            return response(['status' => 1,'data' => $appointments]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    

    /* get all appoinments data by date */
    public function appointmentListByDate(Request $request){
        
        $user_id     = $request->input('user_id');
        $chamber_uid = $request->input('chamber_uid');
        $offset      = $request->input('offset');
        $limit       = $request->input('limit');
        $date        = $request->input('date');
        
        $user = User::find($user_id);

        $dr_query = DB::table('appointments');
        // $dr_query->leftJoin('patientses', 'patientses.id', '=', 'appointments.patient_id');

        if($user->chamber_id > 0)        {
            $dr_query->where('chamber_id',$chamber_uid);
        }

        /*if($user->doctor_type == "0"){
            $dr_query->where('appointment_type',"1");
        } else if($user->doctor_type == "1"){
            $dr_query->where('user_id', $user->id);
        }*/

        if (!empty($date)) {
            $dr_query->where('date', $date);
            $dr_query->orderBy('date', 'ASC');
        }

        $dr_query->orderBy('serial_id', 'desc');

        $dr_query->skip($offset);
        $dr_query->take($limit);

        $appointments = $dr_query->get();

        foreach ($appointments as $key => $value) {

            $appointments[$key]->patient = DB::table('patientses')->where('id', $value->patient_id)->first();
            $appointments[$key]->chamber = DB::table('chamber')->where('uid', $value->chamber_id)->first();

            $query2 = DB::table('prescription as p');
            $query2->where('p.patient_id', $value->patient_id);
            $query2->where(DB::raw("(DATE_FORMAT(p.created_at,'%Y-%m-%d'))"), $value->date);
            $appointments[$key]->is_done = $query2->count();

            // User Payment status
            $query3 = DB::table('payment_user');
            $query3->where('user_id', $value->user_id);
            $query3->where('appointment_id', $value->id);
            $payment = $query3->first();
            if (empty($payment)) {
                $appointments[$key]->payment_status = 0;
            } else {
                if ($payment->status == 'verified') {
                    $appointments[$key]->payment_status = 1;
                } else {
                    $appointments[$key]->payment_status = 0;
                }
            }
        }

        if(!empty($appointments)){
            return response(['status' => 1,'data' => $appointments]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }

    /* get appointment view of patient and doctor*/
    public function appointmentView(Request $request){
        $appointment_id = $request->input('appointment_id');

        $appointment = DB::table('appointments')->where('id', $appointment_id)->orderBy('date', 'DESC')->first();
        if(!empty($appointment)){
            $patient = DB::table('patientses')->select('name', 'mobile', 'email', 'mr_number', 'report')->where('id', $appointment->patient_id)->first();
            $appointment->patient = $patient;
        }

        if(!empty($appointment)){
            return response(['status' => 1,'data' => $appointment]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }

    /* get all appoinment schedule of doctor*/
    public function schedule(Request $request){
        $user_id = $request->input('user_id');
        $assign_days = DB::table('assign_time')->where('user_id', $user_id)->orderBy('day_id', 'ASC')->get();
        if(!empty($assign_days)){
            foreach ($assign_days as $key => $day) {
                $assign_time = DB::table('assign_time')->where('user_id', $day->user_id)->where('day_id', $day->day)->orderBy('day_id', 'ASC')->get();
                $assign_days[$key]->assign_time = $assign_time;
            }
        }
        if(!empty($assign_days)){
            return response(['status' => 1,'data' => $assign_days]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }

    /* get all appoinment schedule of doctor*/
    public function addSchedule(Request $request){
        $user_id = $request->input('user_id');
        $type    = $request->input('type');
        $days    = $request->input('days');

        if($days){
            $count = 1;
            foreach ($days as $key => $schedule_times) {

                $day_name = $key;

                $assign_time = DB::table('assign_time')->where(function($query) use ($user_id, $day_name, $type){
                    $query->where('user_id', $user_id);
                    $query->where('day_name', $day_name);
                    $query->where('type', $type);
                })->first();

                if(!empty($assign_time)){
                    DB::table('assign_time')->where(function($query) use ($user_id, $day_name, $type){
                        $query->where('user_id', $user_id);
                        $query->where('day_name', $day_name);
                        $query->where('type', $type);
                    })->delete();
                }

                foreach($schedule_times as $value){
                    
                    $time_data = array(
                        'user_id' => $user_id,
                        'day_id' => $count,
                        'time' => $value['start'] . '-' . $value['end'],
                        'start' => $value['start'],
                        'end' => $value['end'],
                        'day_name' => $day_name,
                        'type' => $type,
                    );
                    $res = DB::table('assign_time')->insert($time_data);
                }

                $count++;
            }
        }
        
        $assign_days = DB::table('assign_time')->where('user_id', $user_id)->orderBy('day_id', 'ASC')->get();        

        if(!empty($assign_days)){
            return response(['status' => 1,'data' => $assign_days]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }

    /* get all appoinments data */
    public function liveConsults(Request $request){
        
        $user_id     = $request->input('user_id');
        $chamber_uid = $request->input('chamber_uid');
        $offset      = $request->input('offset');
        $limit       = $request->input('limit');
        
        $user = User::find($user_id);


        $dr_query = DB::table('appointments');

        if($user->chamber_id > 0)        {
            $dr_query->where('chamber_id',$chamber_uid);
        }

        /*if($user->doctor_type == "0"){
            $dr_query->where('appointment_type', 1);
        } else if($user->doctor_type == 1){
            $dr_query->where('user_id', $user->id );
        }*/

        $dr_query->where('user_id', $user->id );
        $dr_query->orderBy('id', 'DESC');
        $dr_query->skip($offset);
        $dr_query->take($limit);

        $appointments = $dr_query->get();

        foreach ($appointments as $key => $value) {

            /* get consult patient */
            $patient = DB::table('patientses')->select('name', 'mobile', 'email', 'mr_number');
            $patient->where('id', $value->patient_id);
            $appointments[$key]->patient = $patient->first();

            /* get consult chamber */
            $chamber = DB::table('chamber')->select('name');
            $chamber->where('uid', $value->chamber_id);
            $appointments[$key]->chamber = $chamber->first();

            /* get consult users */
            $user = DB::table('users')->select('name');
            $user->where('id', $value->user_id);
            $appointments[$key]->doctor = $user->first();

            /* get consult payment users */
            $payment_user = DB::table('payment_user')->select('status');
            $payment_user->where('appointment_id', $value->id);
            $appointments[$key]->payment_user = $payment_user->first();
        }

        if(!empty($appointments)){
            return response(['status' => 1,'data' => $appointments]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }

    /* edit live consult*/
    public function liveConsultEdit(Request $request){
        $appointment_id = $request->input('appointment_id');
        $chamber_id     = $request->input('chamber_id');
        $time           = $request->input('time');
        $date           = $request->input('date');
        $meeting_notes  = $request->input('meeting_notes');
        
        $data = array(
            'date' => date('Y-m-d', strtotime($date)),
            'time' => $time,
            'meeting_notes' => $meeting_notes,
        );
        $res = DB::table('appointments')
                ->where('id', $appointment_id)
                ->update($data);

        if(!empty($res)){
            return response(['status' => 1,'data' => $res]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }

    /* Join Patiant appointment by doctor */
    public function appointmentJoin(Request $request){
        
        $appointment_id = $request->input('appointment_id');
        $user_id        = $request->input('user_id');

        $user = User::find($user_id);

        $appoint = DB::table('appointments')->where('id', $appointment_id)->first();
            
            if($user->role == "vle" || $user->role == "staff"){
                $data = array(
                    'status' => 1,
                    'link' => $appoint->video_link
                );
            }
            else if ($appoint->user_id == 0 || null == $appoint->user_id || $appoint->is_joined == "0") {
                $data = array(
                    'status' => 1,
                    'link' => $appoint->video_link
                );

                $array = array('user_id' => $user->id, 'is_joined' => 1, 'status' => 1);
                DB::table('appointments')->where('id', $appointment_id)->update($array);

                if($appoint->amber_id != '24163'){
                    // amount to doctor
                    $doctorAmount = $appoint->appointment_type == 1 ? 85 : 300;
                    amount_to_doctor($appoint->id, $user->id, $doctorAmount);
                }

            } else {
                if ($user->id == $appoint->user_id) {
                    $data = array(
                        'status' => 1,
                        'link' => $appoint->video_link
                    );
                } else {
                    $data = array(
                        'status' => 0,
                        'msg' => 'This patient is already attended by another doctor',
                        'link' => ''
                    );
                }
            }

            return response($data);
    }

    /* search appoinments data */
        public function search_appointments(Request $request){
            $user_id     = $request->input('user_id');
            $chamber_uid = $request->input('chamber_uid');
            $offset      = $request->input('offset');
            $limit       = $request->input('limit');
            $name        = $request->input('name');
            
            $user = User::find($user_id);
    
            $dr_query = DB::table('appointments');
            // $dr_query->leftJoin('patientses', 'patientses.id', '=', 'appointments.patient_id');
    
            if($user->chamber_id > 0)        {
                $dr_query->where('chamber_id',$chamber_uid);
            }
    
            /*if($user->doctor_type == "0"){
                $dr_query->where('appointment_type',"1");
            } else if($user->doctor_type == "1"){
                $dr_query->where('user_id', $user->id);
            }*/
    
            if (!empty($name)) {
                $patient_name = DB::table('patientses')->orWhere('name', 'like', '%' . $name . '%')->first();
                if($patient_name){
                    $dr_query->where('patient_id', $patient_name->id);
                }else{
                    $dr_query->where('patient_id', 0);
                } 
                // $dr_query->orderBy('date', 'ASC');
            }
    
            // $dr_query->orderBy('serial_id', $name);
    
            $dr_query->skip($offset);
            $dr_query->take($limit);
    
            $appointments = $dr_query->get();
    
            foreach ($appointments as $key => $value) {
    
                $appointments[$key]->patient = DB::table('patientses')->where('id', $value->patient_id)->first();
                $appointments[$key]->chamber = DB::table('chamber')->where('uid', $value->chamber_id)->first();
    
                $query2 = DB::table('prescription as p');
                $query2->where('p.patient_id', $value->patient_id);
                $query2->where(DB::raw("(DATE_FORMAT(p.created_at,'%Y-%m-%d'))"), $value->date);
                $appointments[$key]->is_done = $query2->count();
    
                // User Payment status
                $query3 = DB::table('payment_user');
                $query3->where('user_id', $value->user_id);
                $query3->where('appointment_id', $value->id);
                $payment = $query3->first();
                if (empty($payment)) {
                    $appointments[$key]->payment_status = 0;
                } else {
                    if ($payment->status == 'verified') {
                        $appointments[$key]->payment_status = 1;
                    } else {
                        $appointments[$key]->payment_status = 0;
                    }
                }
            }
    
            if(!empty($appointments)){
                return response(['status' => 1,'data' => $appointments]);
            }else{
                return response(['status' => 1,'data' => 'Data not found']);
            }
        }
}

?>