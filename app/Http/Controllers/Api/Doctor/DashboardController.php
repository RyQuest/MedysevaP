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
        
        $user = User::find($user_id);
        $data['staffs'] = DB::table('staffs')->where('id', $user_id)->orWhere('chamber_id', $user->chamber_id)->count();
        $data['patients'] = DB::table('patientses')->count();
        $data['latest_appointments'] = DB::table('appointments')->where('status', 0)->where('created_at', '>', date('Y-m-d'))->get();

        if(!empty($data)){
            return response(['status' => 1,'data' => $data]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
}

?>