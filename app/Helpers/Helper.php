<?php 
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
    return $wallet->amount;
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
?>