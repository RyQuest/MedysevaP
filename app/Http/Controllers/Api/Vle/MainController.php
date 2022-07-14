<?php

namespace App\Http\Controllers\Api\Vle;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use App\Models\Chamber;
use App\Models\Patients;
use App\Models\TrHistory;
use App\Models\User;
use App\Models\UserWallet;
use App\Models\VleUser;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Config;

class MainController extends Controller
{
    //
    public function __construct()
    {
        Config::set('jwt.user', VleUser::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => VleUser::class,
        ]]);
    }

    public function patientses(Request $request){
        $chamber_uid = Chamber::where('id', $request->input('chamber_id'))->pluck('uid');
        $offset     = $request->input('offset');
        $limit      = $request->input('limit');

        $patientses = Patients::where('chamber_id', $chamber_uid)
                        ->take($limit)
                        ->skip($offset)
                        ->orderBy('name', 'asc')
                        ->get();
        if(!empty($patientses)){
            return response(['status' => 1,'data' => $patientses]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    public function patientsSearch(Request $request){
        $search_query    = $request->input('search_query');
        $chamber_uid = Chamber::where('id', $request->input('chamber_id'))->pluck('uid');
        
        $patientses = Patients::where('chamber_id', $chamber_uid)
                        ->where('name', 'like', '%'.$search_query.'%')
                        ->orderBy('name', 'asc')
                        ->get();
        if(!empty($patientses)){
            return response(['status' => 1,'data' => $patientses]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
}
