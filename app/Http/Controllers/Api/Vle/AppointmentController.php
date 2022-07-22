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

class AppointmentController extends Controller
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

    public function create(Request $request)
    {
        $vle_id = $request->input('vle_id');
        $patient_data = $request->input('patient_data');

        /* Validation start */
            $validator = \Validator::make($request->all(), [
                'consultation_type' => 'required',
                'date' => 'required',
                'patient_type' => 'required',
            ]);
            if ($validator->fails()) {
                return response(['status' => 0, 'msg' => $validator->errors()->first()]);
            }
            if ($request->get('patient_type') == "1") {
                $validator = \Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required',
                    'mobile' => 'required',
                    'age' => 'required',
                ]);
                if ($validator->fails()) {
                    return response(['status' => 0, 'msg' => $validator->errors()->first()]);
                }
            } else{
                $validator = \Validator::make($request->all(), [
                    'patient_id' => 'required',
                ]);
                if ($validator->fails()) {
                    return response(['status' => 0, 'msg' => $validator->errors()->first()]);
                }
            }
            // $user = JWTAuth::parseToken()->authenticate($request->get('token'));
            $user = VleUser::find($vle_id);
            if(empty($user)){
                return response(['status' => 0, 'msg' => 'VLE not found']);
            }

            // vle user Wallet before Appoinment 
            $vleUserWallet = UserWallet::where('user_id',$user->id)->where('user_role','vle')->first();

            $consultation_fee = 0;
            if ($request->get('consultation_type') == "1") {
                $consultation_fee = 150;
            } else {
                $consultation_fee = 500;
            }
            if ($consultation_fee > $vleUserWallet->amount) {
                return response(['status' => 0, 'msg' => 'Insufficient wallet amount']);
            }
        /* validation end */
        
        DB::beginTransaction();

        // Create patient if patient_type is 1.
        $patient = null;
        if ($request->get('patient_type') == "1") {
            $patient = Patients::create([
                'user_id' => $user->id,

                'name' => $request->get('name'),

                'email' => $request->get('email'),

                'mr_number' => rand(11111, 99999),

                'about_id' => $request->get('about_medyseva'),
                'other' => $request->get('other'),

                'age' => $request->get('age'),

                'govt_id' => $request->get('govt_id'),

                'govt_id_detail' => $request->get('govt_id_detail'),

                'occuptation' => $request->get('occuptation'),
                'weight' => $request->get('weight'),

                'sex' => $request->get('sex'),

                'mobile' => $request->get('mobile'),

                'present_address' => $request->get('present_address'),

                'password' => bcrypt('123456'),
                // 'password' => bcrypt(rand(1111, 9999)),

                'created_at' => date('Y-m-d H:i:s'),

                'added_by' => $user->id,
                'added_by_role' => 'vle',
                'national_health_id' => $request->get('national_health_id'),
            ]);
        } else {
            $patient = Patients::find($request->get('patient_id'));
        }
        if(null == $patient){
            return response(['status' => 0, 'msg' => 'Patient not found']);
        }
        $chamber = Chamber::find($user->chamber_id);
        
        if(null == $chamber){
            return response(['status' => 0, 'msg' => 'Chamber not found']);
        }
        $appointment = Appointment::create([
            'chamber_id' => $chamber->uid,
            'user_id'    => 0,
            'patient_id' => $patient->id,
            'date'       => $request->get('date'),
            'time'       => $request->get('time'),
            'type'       => $request->get('cons_type'),
            'serial_id'  => 0,
            'status'     => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

            't' => $patient_data['temperature'],
            'p' => $patient_data['pulse_rate'],
            'r' => $patient_data['respiratory_rate'],
            'bp' => $patient_data['blood_pressure'],
            'ht' => $patient_data['height'],
            'wt' => $patient_data['weight'],
            'spo2' => $patient_data['spo2'],
            'fbs' => $patient_data['fbs'],
            'rbs' => $patient_data['rbs'],
            'ppbs' => $patient_data['ppbs'],
            'blood_group' => $patient_data['blood_group'],
            'follow_up' => $patient_data['follow_up_patient'],
            'added_by' => $user->id,
            'added_by_role' => 'vle',
            'appointment_type' => $request->get('consultation_type')
        ]);

        // check consultation type is general else special
        if ($request->get('consultation_type') == "1") {
            $service_fee = 150;
            /*$vle_ref = 19;
            $partner_ref = 9.50;
            $medy_sewa_ref = 121.50;*/
            $vle_ref = 20;
            $partner_ref = 10;
            $medy_sewa_ref = 119;

        } else {
            $service_fee = 500;
            /*$vle_ref = 57;
            $partner_ref = 28.50;
            $medy_sewa_ref = 414.50;*/
            $vle_ref = 60;
            $partner_ref = 30;
            $medy_sewa_ref = 410;
        }
        
        $trx_id = uniqid();

        // $loginUserAmt = $vleUserWallet->amount;
        // Vle user wallet amount after service deduct
        $vleUserWalletAmt = floatval($vleUserWallet->amount) - floatval($service_fee);

        // admin wallet obj
        $adminwallet = UserWallet::find(4);
        $adminWalletAmt = floatval($adminwallet->amount)+floatval($service_fee) ; // Admin Wallet Amount after service fees added
        
        // Service fees transaction from VLE to Admin
        TrHistory::create([
            'user_id' => $user->id,
            'trx_id' => $trx_id,
            'user_role' =>  'vle',
            'wallet_id' => $vleUserWallet->id,
            'from_wallet' => $vleUserWallet->id,
            'to_wallet' => 4,
            'category' => 'appointment',
            'appointment_id' => $appointment->id,
            'amount' => $service_fee,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'current_amount' => $vleUserWalletAmt,
            'receiver_amount' => $adminWalletAmt,
            'patient_id' => $patient->id
        ]);


        // Admin wallet amount after deduct vle reference
        $adminWalletAmt     = floatval($adminWalletAmt) - floatval($vle_ref);
        // Vle user wallet amount after add vle reference
        $vleUserWalletAmt   = floatval($vleUserWalletAmt) + floatval($vle_ref);

        // VLE reference transaction from Admin to VLE
        TrHistory::create([
            'user_id' => $user->id,
            'trx_id' => $trx_id,
            'user_role' =>  'vle',
            'wallet_id' => $vleUserWallet->id,
            'from_wallet' => 4,
            'to_wallet' => $vleUserWallet->id,
            'category' => 'appointment_referral',
            'appointment_id' => $appointment->id,
            'amount' => $vle_ref,
            'vle_referral' => $vle_ref,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'current_amount' => $adminWalletAmt,
            'receiver_amount' => $vleUserWalletAmt,
            'patient_id' => $patient->id
        ]);        

        // calculate VLE TDS
        $vleTds   = ($vle_ref * 5) / 100;
        $medy_sewa_ref = $medy_sewa_ref + $vleTds;
        
        // Admin wallet amount after added vle tds
        $adminWalletAmt = $adminWalletAmt + $vleTds;
        // VLE user wallet amount after deducted vle tds
        $vleUserWalletAmt = $vleUserWalletAmt - $vleTds;

        // VLE TDS transaction from VLE to Admin
        TrHistory::create([
            'user_id' => 1,
            'user_role' =>  'admin',
            'trx_id' => $trx_id,
            'wallet_id' => 4,
            'from_wallet' => $vleUserWallet->id,
            'to_wallet' => 4,
            'category' => 'tds',
            'appointment_id' => $appointment->id,
            'amount' => $vleTds,
            'medyseva_referral' => $medy_sewa_ref,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'current_amount' => $vleUserWalletAmt,
            'receiver_amount' => $adminWalletAmt,
            'patient_id' => $patient->id
        ]);

        // calculate Partner TDS
        $partnerTds = 0;
        if ($user->added_by_role == "partner") {
            $partnerTds = ($partner_ref * 5) / 100;
            $medy_sewa_ref = $medy_sewa_ref + $partnerTds;
        } else {
            $partner_ref = 0;
        }


        // partner ref
        if ($user->added_by_role == "partner") {
            $partnerWallet = UserWallet::find(5);
            $partnerUserWallet = $partnerWallet->amount;

            $adminWalletAmt = $adminWalletAmt - $partner_ref;
            $partnerUserWallet = $partnerUserWallet + $partner_ref;

            // Partner refernce transaction from Admin to partner
            TrHistory::create([
                'user_id' => 96,
                'trx_id' => $trx_id,
                'user_role' => 'partner',
                'wallet_id' => $partnerWallet->id,
                'from_wallet' => 4,
                'to_wallet' => $partnerWallet->id,
                'category' => 'appointment_referral',
                'appointment_id' => $appointment->id,
                'amount' => $partner_ref,
                'medyseva_referral' => $medy_sewa_ref,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'current_amount' => $adminWalletAmt,
                'receiver_amount' => $partnerUserWallet,
                'patient_id' => $patient->id
            ]);

            // add Partner TDS to Admin wallet
            $adminWalletAmt = $adminWalletAmt + $partnerTds;
            // deduct Partner TDS from patner wallet
            $partnerUserWallet = $partnerUserWallet - $partnerTds;

            TrHistory::create([
                'user_id' => 1,
                'trx_id' => $trx_id,
                'user_role' => 'admin',
                'wallet_id' => 4,
                'from_wallet' => $partnerWallet->id,
                'to_wallet' => 4,
                'category' => 'tds',
                'appointment_id' => $appointment->id,
                'amount' => $partnerTds,
                'medyseva_referral' => $medy_sewa_ref,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'current_amount' => $partnerUserWallet,
                'receiver_amount' => $adminWalletAmt,
                'patient_id' => $patient->id
            ]);

            // update partner wallet
            UserWallet::where('id', $partnerWallet->id)->update(['amount' => $partnerUserWallet]);
        }

        // update user wallet
        UserWallet::where('id', 4)->update(['amount' => $adminWalletAmt]);
        UserWallet::where('id', $vleUserWallet->id)->update(['amount'=> $vleUserWalletAmt]);


        if($request->get('consultation_type') == 1){
        // General Doctor list
        $firebaseToken = User::whereNotNull('device_token')
            ->where('device_token', '!=', '')
            ->where('device_token', '!=', '0')
            ->where('doctor_type', '0')
            ->pluck('device_token')
            ->all();
        }else{
            // special Doctor list
            $firebaseToken = User::whereNotNull('device_token')
                    ->where('device_token', '!=', '')
                    ->where('device_token', '!=', '0')
                    ->where('doctor_type', '1')
                    ->pluck('device_token')
                    ->all();

        }
        $data = [
            'firebaseToken' => $firebaseToken,
            'title' => 'New Appointment has been arrised',
            'body' => 'Hello Dr. there are new appointment booked, please check!',
        ];

        $res = sendNotification($data);

        DB::commit();

        return response(['status' => 1, 'msg' => 'Appointment created successfully']);
    }

    public function index(Request $request)
    {
        $vle_id = $request->input('vle_id');
        $limit = $request->input('limit');
        $offset = $request->input('offset');

        /*$appointment = Appointment::select('appointments.*','patientses.name')
        ->join('patientses','patientses.id','=','appointments.patient_id')
        ->where('appointments.added_by', $vle_id)
        ->where('appointments.added_by_role', 'vle')
        ->take($limit)
        ->skip($offset)
        ->get();*/

        $appointment = Appointment::with(['patient', 'chamber', 'doctor', 'payment_user'])
                        ->where('added_by', $vle_id)
                        ->where('added_by_role', 'vle')
                        ->take($limit)
                        ->skip($offset)
                        ->orderBy('id', 'desc')
                        ->get();

        return response(['status' => 1,'data' => $appointment]);
    }
}
