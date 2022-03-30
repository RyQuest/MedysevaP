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
function vleUser($id){
    $user = \App\Models\VleUser::where('id',$id)->first();
    return $user;
}
function getuser($id){
    $user = \App\Models\User::where('id',$id)->first();
    return $user;
}

?>