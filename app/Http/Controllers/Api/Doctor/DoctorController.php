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

        if($user->chamber_id > 0)        {
            $dr_query->where('chamber_id',$chamber_uid);
        }

        $dr_query->groupBy('date');
        $dr_query->skip($offset);
        $dr_query->take($limit);

        $appointments = $dr_query->get();

        foreach ($appointments as $key => $value) {

            $query2 = DB::table('appointments');

            $query2->where('date',$value->date);
            
            $appointments[$key]->total_patients = $query2->count();

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
        $dr_query->leftJoin('patientses', 'patientses.id', '=', 'appointments.patient_id');

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
            $query2 = DB::table('prescription as p');
            $query2->where('p.patient_id', $value->patient_id);
            $query2->where(DB::raw("(DATE_FORMAT(p.created_at,'%Y-%m-%d'))"), $value->date);
            $appointments[$key]->is_done = $query2->count();

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
}

?>