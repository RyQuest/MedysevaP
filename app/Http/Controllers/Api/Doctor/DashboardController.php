<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\User;

class DashboardController extends Controller
{
    /* get Doctor profile data */
    public function dashboard(Request $request){
        $user_id     = $request->input('user_id');
        $chamber_uid = $request->input('chamber_uid');
        $offset      = $request->input('offset');
        $limit       = $request->input('limit');

        $user = User::find($user_id);

        $data['staffs']                                    = DB::table('staffs')->where('id', $user_id)->orWhere('chamber_id', $user->chamber_id)->count();
        $data['patients']                               = DB::table('patientses')->count();
        $data['total_today_appointments'] = DB::table('appointments')->where('date', date('Y-m-d'))->where('user_id', $user_id)->count();
        $data['all_appointments']                   = DB::table('appointments')->where('user_id', $user_id)->count();
        $data['latest_appointments']            = DB::table('appointments')->where('status', 0)->where('date', '>', date('Y-m-d'))->count();

        $data['total_patients']                  = DB::table('appointments')->where('user_id', $user_id)->count();
        $data['todays_patients']              = DB::table('appointments')->where('date', date('Y-m-d'))->where('user_id',$user_id)->count();
        $data['missed_patients']            = DB::table('appointments')->where('date', '<', date('Y-m-d'))->where('user_id',$user_id)->where('status', 0)->count();
        $data['wallet'] = DB::table('user_wallet')->where('user_id', $user_id)->pluck('amount');

        $dr_query = DB::table('appointments');
        if($user->chamber_id > 0)        {
            $dr_query->where('chamber_id',$chamber_uid);
        }

        if($user->doctor_type == "0"){
            $dr_query->where('appointment_type', 1);
        } else if($user->doctor_type == "1"){
            $dr_query->where('user_id', $user_id);
        }

        $dr_query->skip($offset);
        $dr_query->take($limit);

        $data['appointments'] = $dr_query->get();;

        if(!empty($data)){
            return response(['status' => 1,'data' => $data]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
}

?>