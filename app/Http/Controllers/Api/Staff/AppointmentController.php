<?php

namespace App\Http\Controllers\Api\Staff;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Chamber;
use App\Models\Patients;
use App\Models\Staff;
use App\Models\TrHistory;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use JWTAuth;
use Config;

class AppointmentController extends Controller
{
    //

    public function __construct()
    {
        Config::set('jwt.user', Staff::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => Staff::class,
        ]]);
    }

    public function index(Request $request)
    {
        $appointment = Appointment::select('appointments.*','patientses.name')
        ->join('patientses','patientses.id','=','appointments.patient_id')
        ->get();

        return response(['status' => 1,'data' => $appointment]);
    }
    
    public function create(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'consultation_type' => 'required',
            'date' => 'required',
            'patient_type' => 'required',
            'doctor_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'patient_id' => 'required',
            'chamber_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['status' => 0, 'msg' => $validator->errors()->first()]);
        }
       
        $user = JWTAuth::parseToken()->authenticate($request->get('token'));
        $userAalletAmount = UserWallet::where('user_id', $request->get('vle_id'))->where('user_role', 'vle')->first();
        $consultation_fee = 0;
        if ($request->get('consultation_type') == "1") {
            $consultation_fee = 150;
        } else {
            $consultation_fee = 500;
        }
        if ($consultation_fee > $userAalletAmount->amount) {
            return response(['status' => 0, 'msg' => 'Insufficient wallet amount']);
        }
        
        $patient = Patients::find($request->get('patient_id'));

        if (null == $patient) {
            return response(['status' => 0, 'msg' => 'Patient not found']);
        }
        // $chamber = Chamber::find($request->get('chamber_id'));

        // if (null == $chamber) {
        //     return response(['status' => 0, 'msg' => 'Chamber not found']);
        // }
        $appointment = Appointment::create([
            'chamber_id' => $request->get('chamber_id'),
            'user_id' => $request->get('doctor_id'),
            'patient_id' => $patient->id,
            'camp_type' => "",
            'camp_name' => '',

            'serial_id' => 0,

            'date' => $request->get('date'),

            'time' => $request->get('time'),

            'status' => 0,

            'type' => $request->get('cons_type'),

            't' => $request->get('t'),

            'p' => $request->get('p'),

            'r' => $request->get('r'),

            'bp' => $request->get('bp'),

            'ht' => $request->get('ht'),

            'wt' => $request->get('wt'),

            'spo2' => $request->get('spo2'),

            'chief_complains' => $request->get('chief_complains'),
            'consultations_type'  => "", //$request->get('payment_mode'),
            'follow_up' => $request->get('follow_up'),
            'created_at' => date('Y-m-d H:i:s'),
            'added_by' => $user->id,
            'added_by_role' => 'vle',
            'fbs' => $request->get('fbs'),
            'rbs' => $request->get('rbs'),
            'ppbs' => $request->get('ppbs'),
            'blood_group' => $request->get('blood_group'),
            'appointment_type' => $request->get('consultation_type')
        ]);

        if ($request->get('consultation_type') == "1") {
            $service_fee = 150;
            $vle_ref = 19;
            $partner_ref = 9.50;
            $medy_sewa_ref = 121.50;
        } else {
            $service_fee = 500;
            $vle_ref = 57;
            $partner_ref = 28.50;
            $medy_sewa_ref = 414.50;
        }

        $vleTds = ($vle_ref * 5) / 100;

        $partnerTds = 0;

        if ($user->added_by_role == "partner") {
            $partnerTds = ($partner_ref * 5) / 100;
            $medy_sewa_ref = $medy_sewa_ref + $partnerTds;
        } else {
            $partner_ref = 0;
        }

        $trx_id = uniqid();

        $medy_sewa_ref = $medy_sewa_ref + $vleTds;

        $loginUserAmt = $userAalletAmount->amount;
        $loginUserAmt = $loginUserAmt - $service_fee;

        // admin wallet
        $adminwallet = UserWallet::find(4);
        $adminNewAmount = $adminwallet->amount + $service_fee;

        TrHistory::create([
            'user_id' => $user->id,
            'trx_id' => $trx_id,
            'user_role' =>  'vle',
            'wallet_id' => $userAalletAmount->id,
            'from_wallet' => $userAalletAmount->id,
            'to_wallet' => 4,
            'category' => 'appointment',
            'appointment_id' => $appointment->id,
            'amount' => $service_fee,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'current_amount' => $loginUserAmt,
            'receiver_amount' => $adminNewAmount,
            'patient_id' => $patient->id
        ]);

        // add vle ref
        $adminNewAmount = $adminNewAmount - $vle_ref;
        $loginUserAmt = $loginUserAmt + $vle_ref;
        TrHistory::create([
            'user_id' => $user->id,
            'user_role' =>  'vle',
            'trx_id' => $trx_id,
            'wallet_id' => $userAalletAmount->id,
            'from_wallet' => 4,
            'to_wallet' => $userAalletAmount->id,
            'category' => 'appointment_referral',
            'appointment_id' => $appointment->id,
            'amount' => $vle_ref,
            'doctor_fee' => 0,
            'junior_doctor_fee' => 0,
            'vle_referral' => $vle_ref,
            'partner_referral' => 0,
            'medyseva_referral' => $medy_sewa_ref,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'current_amount' => $adminNewAmount,
            'receiver_amount' => $loginUserAmt,
            'patient_id' => $patient->id
        ]);

        // add tds
        $adminNewAmount = $adminNewAmount + $vleTds;
        $loginUserAmt = $loginUserAmt - $vleTds;

        TrHistory::create([
            'user_id' => 1,
            'user_role' =>  'admin',
            'trx_id' => $trx_id,
            'wallet_id' => 4,
            'from_wallet' => $userAalletAmount->id,
            'to_wallet' => 4,
            'category' => 'tds',
            'appointment_id' => $appointment->id,
            'amount' => $vleTds,
            'doctor_fee' => 0,
            'junior_doctor_fee' => 0,
            'vle_referral' => $vle_ref,
            'partner_referral' => 0,
            'medyseva_referral' => $medy_sewa_ref,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'current_amount' => $loginUserAmt,
            'receiver_amount' => $adminNewAmount,
            'patient_id' => $patient->id
        ]);

        // partner ref
        if ($partner_ref > 0) {
            $partnerWallet = UserWallet::find(5);
            $partnerUserWallet = $partnerWallet->amount;

            $adminNewAmount = $adminNewAmount - $partner_ref;
            $partnerUserWallet = $partnerUserWallet + $partner_ref;

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
                'doctor_fee' => 0,
                'junior_doctor_fee' => 0,
                'vle_referral' => $vle_ref,
                'partner_referral' => 0,
                'medyseva_referral' => $medy_sewa_ref,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'current_amount' => $adminNewAmount,
                'receiver_amount' => $partnerUserWallet,
                'patient_id' => $patient->id
            ]);

            // add tds
            $adminNewAmount = $adminNewAmount + $partnerTds;

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
                'doctor_fee' => 0,
                'junior_doctor_fee' => 0,
                'vle_referral' => $vle_ref,
                'partner_referral' => 0,
                'medyseva_referral' => $medy_sewa_ref,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'current_amount' => $partnerUserWallet,
                'receiver_amount' => $adminNewAmount,
                'patient_id' => $patient->id
            ]);

            // update partner wallet
            UserWallet::where('id', $partnerWallet->id)->update(['amount' => $partnerUserWallet]);
        }

        // update user wallet
        UserWallet::where('id', 4)->update(['amount' => $adminNewAmount]);
        UserWallet::where('id', $userAalletAmount->id)->update(['amount' => $loginUserAmt]);

        return response(['status' => 1, 'msg' => 'Appointment created successfully']);
    }
}
