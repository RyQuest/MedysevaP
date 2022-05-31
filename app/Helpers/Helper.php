<?php

use App\Models\Chamber;
use Illuminate\Support\Facades\DB;

$vle_comission = 19;
$partner_comission = 9.50;

function vle_comission($amount){
    $comm = ($amount * $vle_comission) / 100;
    return $comm;
}

function partner_comission($amount){
    $comm = ($amount * $partner_comission) / 100;
    return $comm;
}

function walletAmount($wallet_id){
    $wallet = \App\Models\UserWallet::where('id',$wallet_id)->first();
    if($wallet){
        return $wallet->amount;
    }
    return "0";
}

function userAalletAmount($user_id,$user_role){
    $wallet = \App\Models\UserWallet::where('user_id',$user_id)->where('user_role',$user_role)->first();
    if(null == $wallet){
        return 0;
    }
    return $wallet->amount;
}
function vleUser($id){
    $user = \App\Models\VleUser::where('id',$id)->first();
    return $user;
}

function patientInfo($id){
    $user = \App\Models\Patients::where('id',$id)->first();
    return $user;
}

function getUsername($wallet_id){
    $wallet = \App\Models\UserWallet::where('id',$wallet_id)->first();
    if($wallet){
        if($wallet->user_role == "vle"){
            $data = vleUser($wallet->user_id);
            return $data->name;
        } else{
            $data = getuser($wallet->user_id);
            return $data->name;
        }
    }
}
function getuser($id){
    $user = \App\Models\User::where('id',$id)->first();
    return $user;
}

function patientData($id){
    $user = \App\Models\Patients::where('id',$id)->first();
    return $user;
}

function addressProof($value){
    $data = "";
    if($value == "electricity-bill"){
        $data = "Electricity Bill";
    } else if($value == "water-bill"){
        $data = "Water Bill";
    } else if($value == "telephone-bill"){
        $data = "Telephone Bill";
    }
    return $data;
}

function loginUserWallet(){
     $wallet = \App\Models\UserWallet::where('user_id',auth()->user()->id)->where('user_role','partner')->first();
     return $wallet;
}

function trxInfo($vle_id,$trx_id,$category){
    return \App\Models\TrHistory::where('trx_id',$trx_id)->where('category',$category)->where('vle_id',$vle_id)->first();
}

function apiUrl(){
    return "https://clinic.medyseva.com/";
}


if(!function_exists('amount_to_doctor')){
    function amount_to_doctor($appointment_id, $doctor_id, $amount){

        $doctorTds = ($amount * 10) / 100;

        $old_trx = DB::table('trx_history')->where('appointment_id', $appointment_id)->where('category', 'appointment')->first();

        // admin wallet
        $adminWallet = DB::table('user_wallet')->where('id', 4)->first();
        $adminNewAmount = $adminWallet->amount;
        $adminNewAmount = $adminNewAmount - $amount;


        // doctor wallet
        $docWallet = DB::table('user_wallet')->where('user_id', $doctor_id)->where('user_role', 'user')->first();
        $docNewAmount = $docWallet->amount;

        $docNewAmount = $docNewAmount + $amount;

        if (isset($old_trx)) {
            $data1 = array(
                'user_id' => $doctor_id,
                'trx_id' => $old_trx->trx_id,
                'user_role' => 'user',
                'wallet_id' => $docWallet->id,
                'from_wallet' => 4,
                'to_wallet' => $docWallet->id,
                'category' => 'appointment_referral',
                'appointment_id' => $appointment_id,
                'amount' => $amount,
                'doctor_fee' => 0,
                'junior_doctor_fee' => 0,
                'vle_referral' => 0,
                'partner_referral' => 0,
                'medyseva_referral' => 0,
                'created_at' => my_date_now(),
                'updated_at' => my_date_now(),
                'current_amount' => $adminNewAmount,
                'receiver_amount' => $docNewAmount,
                'patient_id' => $old_trx->patient_id
            );

            // $ids = $ci->admin_model->insert($data1, 'trx_history');
            $ids = DB::table('trx_history')->insert($data1);

            // doctor tds

            $adminNewAmount = $adminNewAmount + $doctorTds;
            $docNewAmount = $docNewAmount - $doctorTds;

            $data1 = array(
                'user_id' => 1,
                'trx_id' => $old_trx->trx_id,
                'user_role' => 'admin',
                'wallet_id' => 4,
                'from_wallet' => $docWallet->id,
                'to_wallet' => 4,
                'category' => 'tds',
                'appointment_id' => $appointment_id,
                'amount' => $doctorTds,
                'doctor_fee' => 0,
                'junior_doctor_fee' => 0,
                'vle_referral' => 0,
                'partner_referral' => 0,
                'medyseva_referral' => 0,
                'created_at' => my_date_now(),
                'updated_at' => my_date_now(),
                'current_amount' => $docNewAmount,
                'receiver_amount' => $adminNewAmount,
                'patient_id' => $old_trx->patient_id
            );

            $ids = DB::table('trx_history')->insert($data1);

            // update doctor wallet
            DB::table('user_wallet')->where('id', $docWallet->id)->update($action);
            
            // update admin wallet
            $action = array('amount' => $adminNewAmount);
            DB::table('user_wallet')->where('id', 4)->update($action);
        }        
    }
}

// current date time function

if (!function_exists('my_date_now')) {

    function my_date_now()
    {

        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));

        $date_time = $dt->format('Y-m-d H:i:s');

        return $date_time;
    }
}

?>