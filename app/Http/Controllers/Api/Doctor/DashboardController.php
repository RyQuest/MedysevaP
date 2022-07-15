<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

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


        // SELECT SUM(amount) FROM clinic.trx_history where user_id = 60 AND category = 'appointment_referral';

        /*SELECT SUM(trx.amount) FROM medyseva.appointments as app INNER JOIN medyseva.trx_history as trx ON app.id = trx.appointment_id where app.user_id = 60 AND app.is_joined =1 AND trx.user_id = 60 AND trx.user_role = 'user';*/

        $fees_query = DB::table('appointments AS app')
                ->join('trx_history AS trx', 'app.id', '=', 'trx.appointment_id')
                ->where('app.user_id', $user_id)
                ->where('app.is_joined', '1')
                ->where('trx.user_id', $user_id)
                ->where('trx.user_role', 'user')
                ->sum('trx.amount');
        $data['total_consultation_fees'] = $fees_query;

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

    public function dashboardGraph(Request $request){
        $user_id     = $request->input('user_id');
        $chamber_uid = $request->input('chamber_uid');
        $monthly_data = [];
        $week_data = [];
        $consult_fees_array = [];
        $consult_trx_dates = [];
        
        $consultation_trx_dates = DB::table('appointments AS app')
                                ->join('trx_history AS trx', 'app.id', '=', 'trx.appointment_id')
                                ->where('app.user_id', $user_id)
                                ->where('app.is_joined', '1')
                                ->where('trx.user_id', $user_id)
                                ->where('trx.user_role', 'user')
                                ->groupBy('app.date')
                                ->orderBy('trx.created_at', 'desc')
                                ->select( DB::raw('app.date, trx.trx_id, SUM(trx.amount) as total_amount'))
                                ->get();
            
        foreach($consultation_trx_dates as $consult_trx){
            $consult_trx_dates[] = $consult_trx->date; 
            $consult_fees_array[$consult_trx->date] = $consult_trx;
        }

        /* Dr. transaction list monthly date wise start */
            $month_begin = Carbon::now()->subDays(30)->toDateString();
            $month_end = Carbon::now()->toDateString();

            $month_period = CarbonPeriod::create($month_begin, $month_end);
            // Convert the period to an array of dates
            // $dates = $period->toArray();

            // Iterate over the period
            foreach ($month_period as $mdate) {
                $row = [];
                $date_ymd = $mdate->format('Y-m-d');
                if( in_array($date_ymd, $consult_trx_dates) ){
                    $row['date'] = $date_ymd;
                    $row['trx_id'] = $consult_fees_array[$date_ymd]->trx_id;
                    $row['total_amount'] = $consult_fees_array[$date_ymd]->total_amount;
                    $monthly_data[] = $row;
                }else{
                    $row['date'] = $date_ymd;
                    $row['trx_id'] = '';
                    $row['total_amount'] = 0;
                    $monthly_data[] = $row;
                }
            }
        /* End */


        /* Dr. transaction list weekly date wise start */
            $week_begin = Carbon::now()->subDays(7)->toDateString();
            $week_end = Carbon::now()->toDateString();

            $week_period = CarbonPeriod::create($week_begin, $week_end);
            // Convert the period to an array of dates
            // $dates = $period->toArray();

            // Iterate over the period
            foreach ($week_period as $mdate) {
                $w_row = [];
                $wdate_ymd = $mdate->format('Y-m-d');
                if( in_array($wdate_ymd, $consult_trx_dates) ){
                    $w_row['date'] = $wdate_ymd;
                    $w_row['trx_id'] = $consult_fees_array[$wdate_ymd]->trx_id;
                    $w_row['total_amount'] = $consult_fees_array[$wdate_ymd]->total_amount;
                    $week_data[] = $w_row;
                }else{
                    $w_row['date'] = $wdate_ymd;
                    $w_row['trx_id'] = '';
                    $w_row['total_amount'] = 0;
                    $week_data[] = $w_row;
                }
            }
        /* End */

        $main_data = [
            'monthly_data' => $monthly_data,
            'week_data' => $week_data,
        ];

        return response(['status' => 1,'data' => $main_data]);
    }

    public function dashboardGraphPatient(Request $request){
        $user_id     = $request->input('user_id');
        $chamber_uid = $request->input('chamber_uid');
        $monthly_data = [];
        $week_data = [];
        $consult_fees_array = [];
        $consult_trx_dates = [];
        
        $consultation_trx_dates = DB::table('appointments AS app')
                                ->join('trx_history AS trx', 'app.id', '=', 'trx.appointment_id')
                                ->where('app.user_id', $user_id)
                                ->where('app.is_joined', '1')
                                ->where('trx.user_id', $user_id)
                                ->where('trx.user_role', 'user')
                                ->groupBy('app.date')
                                ->orderBy('trx.created_at', 'desc')
                                ->select( DB::raw('app.date, trx.trx_id, count(app.patient_id) as total_patient'))
                                ->get();
            
        foreach($consultation_trx_dates as $consult_trx){
            $consult_trx_dates[] = $consult_trx->date; 
            $consult_fees_array[$consult_trx->date] = $consult_trx;
        }

        /* Dr. transaction list monthly date wise start */
            $month_begin = Carbon::now()->subDays(30)->toDateString();
            $month_end = Carbon::now()->toDateString();

            $month_period = CarbonPeriod::create($month_begin, $month_end);
            // Convert the period to an array of dates
            // $dates = $period->toArray();

            // Iterate over the period
            foreach ($month_period as $mdate) {
                $row = [];
                $date_ymd = $mdate->format('Y-m-d');
                if( in_array($date_ymd, $consult_trx_dates) ){
                    $row['date'] = $date_ymd;
                    $row['trx_id'] = $consult_fees_array[$date_ymd]->trx_id;
                    $row['total_patient'] = $consult_fees_array[$date_ymd]->total_patient;
                    $monthly_data[] = $row;
                }else{
                    $row['date'] = $date_ymd;
                    $row['trx_id'] = '';
                    $row['total_patient'] = 0;
                    $monthly_data[] = $row;
                }
            }
        /* End */


        /* Dr. transaction list weekly date wise start */
            $week_begin = Carbon::now()->subDays(7)->toDateString();
            $week_end = Carbon::now()->toDateString();

            $week_period = CarbonPeriod::create($week_begin, $week_end);
            // Convert the period to an array of dates
            // $dates = $period->toArray();

            // Iterate over the period
            foreach ($week_period as $mdate) {
                $w_row = [];
                $wdate_ymd = $mdate->format('Y-m-d');
                if( in_array($wdate_ymd, $consult_trx_dates) ){
                    $w_row['date'] = $wdate_ymd;
                    $w_row['trx_id'] = $consult_fees_array[$wdate_ymd]->trx_id;
                    $w_row['total_patient'] = $consult_fees_array[$wdate_ymd]->total_patient;
                    $week_data[] = $w_row;
                }else{
                    $w_row['date'] = $wdate_ymd;
                    $w_row['trx_id'] = '';
                    $w_row['total_patient'] = 0;
                    $week_data[] = $w_row;
                }
            }
        /* End */

        $main_data = [
            'monthly_data' => $monthly_data,
            'week_data' => $week_data,
        ];

        return response(['status' => 1,'data' => $main_data]);
    }
}

?>