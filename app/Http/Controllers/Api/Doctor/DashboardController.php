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

        /* consultation fees hourly */
        /* DR. patient count hourly */
        $patient_hourly = [
            "0" => ["00:00", "00:59"],
            "1" => ["01:00", "01:59"],
            "2" => ["02:00", "02:59"],
            "3" => ["03:00", "03:59"],
            "4" => ["04:00", "04:59"],
            "5" => ["05:00", "05:59"],
            "6" => ["06:00", "06:59"],
            "7" => ["07:00", "07:59"],
            "8" => ["08:00", "08:59"],
            "9" => ["09:00", "09:59"],
            "10" => ["10:00", "10:59"],
            "11" => ["11:00", "11:59"],
            "12" => ["12:00", "12:59"],
            "13" => ["13:00", "13:59"],
            "14" => ["14:00", "14:59"],
            "15" => ["15:00", "15:59"],
            "16" => ["16:00", "16:59"],
            "17" => ["17:00", "17:59"],
            "18" => ["18:00", "18:59"],
            "19" => ["19:00", "19:59"],
            "20" => ["20:00", "20:59"],
            "21" => ["21:00", "21:59"],
            "22" => ["22:00", "22:59"],
            "23" => ["23:00", "23:59"],
        ];

        $adata = [];

        foreach($patient_hourly as $key => $value){
            $hrow = [];
            $hrow['time_interval'] = $value[0].'-'.$value[1];
            $query = "SELECT SUM(trx.amount) as `total_amount` FROM appointments as app INNER JOIN trx_history as trx ON app.id = trx.appointment_id where app.user_id = ".$user_id." AND app.is_joined = 1 AND trx.user_role = 'user' AND DATE_FORMAT(app.updated_at,'%H:%i') BETWEEN '".$value[0]."' AND '".$value[1]."'; ";
            $hrow['total_amount'] = DB::select($query);
            $adata[] = $hrow;
        }        
        /* End */        
        /* End */

        $main_data = [
            'monthly_data' => $monthly_data,
            'week_data' => $week_data,
            'hourly_data' => $adata,
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

        /* DR. patient count hourly */
        $patient_hourly = [
            "0" => ["00:00", "00:59"],
            "1" => ["01:00", "01:59"],
            "2" => ["02:00", "02:59"],
            "3" => ["03:00", "03:59"],
            "4" => ["04:00", "04:59"],
            "5" => ["05:00", "05:59"],
            "6" => ["06:00", "06:59"],
            "7" => ["07:00", "07:59"],
            "8" => ["08:00", "08:59"],
            "9" => ["09:00", "09:59"],
            "10" => ["10:00", "10:59"],
            "11" => ["11:00", "11:59"],
            "12" => ["12:00", "12:59"],
            "13" => ["13:00", "13:59"],
            "14" => ["14:00", "14:59"],
            "15" => ["15:00", "15:59"],
            "16" => ["16:00", "16:59"],
            "17" => ["17:00", "17:59"],
            "18" => ["18:00", "18:59"],
            "19" => ["19:00", "19:59"],
            "20" => ["20:00", "20:59"],
            "21" => ["21:00", "21:59"],
            "22" => ["22:00", "22:59"],
            "23" => ["23:00", "23:59"],
        ];

        $adata = [];

        foreach($patient_hourly as $key => $value){
            $hrow = [];
            $hrow['time_interval'] = $value[0].'-'.$value[1];
            $query = "SELECT count(date) as `total_patient` FROM appointments as app where app.user_id = ".$user_id." AND app.is_joined = 1 AND DATE_FORMAT(updated_at,'%H:%i') BETWEEN '".$value[0]."' AND '".$value[1]."'; ";
            $hrow['total_patient'] = DB::select($query);
            $adata[] = $hrow;
        }        
        /* End */

        $main_data = [
            'monthly_data' => $monthly_data,
            'week_data' => $week_data,
            'hourly_data' => $adata,
        ];

        return response(['status' => 1,'data' => $main_data]);
    }

    public function dashboardGraphPatientHourly(Request $request){
        $month_begin = Carbon::now()->subDays(30)->toDateString();
        $month_end = Carbon::now()->toDateString();
        $user_id     = $request->input('user_id');
        $chamber_uid = $request->input('chamber_uid');
        $monthly_data = [];
        $week_data = [];
        $consult_fees_array = [];
        $consult_trx_dates = [];
        
        // $appointments = DB::table('appointments')->where('added_by', '!=', 1)->where('user_id', $user_id)->select('id', 'created_at', 'updated_at', 'joined_time')->get();

        /*foreach ($appointments as $key => $app) {
            $dt = Carbon::create($app->updated_at);
            $dt_time = $dt->format('H:i');
        }*/

        /*$updatedDateTimeList = array();
        $startdate = date("Y-m-d H:i:s",strtotime ("2022-07-18 00:00:00"));
        $enddate = date("Y-m-d H:i:s",strtotime ("2022-07-18 23:59:59"));
        $updatedDateTimeList[] = date("H", strtotime($startdate)); //store the first value
        while ($startdate < $enddate)
        {
          $startdate = strtotime($startdate)+3600; //add one hour to $startdate
          $startdate = date("Y-m-d H:i:s", $startdate); 
          $updatedDateTimeList[] = date("H", strtotime($startdate)); // store to the array
        }*/
        /*for ($i=0; $i < count($updatedDateTimeList); $i++) {
            for ($j=$i; $j <$i+2; $j++) { 
                $row = [];
                $row[0] = $updatedDateTimeList[$i];
                if($i != 24){
                    $row[1] = $updatedDateTimeList[$i+1];
                }
                $patient_hourly[] = $row;
            }
        }*/

        $patient_hourly = [
            "0" => ["00:00", "00:59"],
            "1" => ["01:00", "01:59"],
            "2" => ["02:00", "02:59"],
            "3" => ["03:00", "03:59"],
            "4" => ["04:00", "04:59"],
            "5" => ["05:00", "05:59"],
            "6" => ["06:00", "06:59"],
            "7" => ["07:00", "07:59"],
            "8" => ["08:00", "08:59"],
            "9" => ["09:00", "09:59"],
            "10" => ["10:00", "10:59"],
            "11" => ["11:00", "11:59"],
            "12" => ["12:00", "12:59"],
            "13" => ["13:00", "13:59"],
            "14" => ["14:00", "14:59"],
            "15" => ["15:00", "15:59"],
            "16" => ["16:00", "16:59"],
            "17" => ["17:00", "17:59"],
            "18" => ["18:00", "18:59"],
            "19" => ["19:00", "19:59"],
            "20" => ["20:00", "20:59"],
            "21" => ["21:00", "21:59"],
            "22" => ["22:00", "22:59"],
            "23" => ["23:00", "23:59"],
        ];

        $adata = [];

        foreach($patient_hourly as $key => $value){
            $row = [];
            $row['time_interval'] = $value[0].'-'.$value[1];
            $query = "SELECT count(date) as `total_patient` FROM appointments as app where app.user_id = ".$user_id." AND app.is_joined = 1 AND DATE_FORMAT(updated_at,'%H:%i') BETWEEN '".$value[0]."' AND '".$value[1]."'; ";
            $row['total_patient'] = DB::select($query);
            $adata[] = $row;
        }
        
        return response(['status' => 1,'data' => $adata]);
    }
}

?>