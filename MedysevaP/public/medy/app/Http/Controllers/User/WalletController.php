<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserWallet;
use App\Models\WithdrawRequest;
use App\Models\TrHistory;
use App\Models\VleUser;
use App\Models\Invoices;
use DB;

class WalletController extends Controller
{
    //
    public function index(){
        
        $data['wallet'] = UserWallet::where('user_id',auth()->user()->id)->where('user_role',auth()->user()->role)->first();
        $data['data'] = TrHistory::where('wallet_id',$data['wallet']->id)->orderBy('id','desc')->limit('10')->get();
        
        return view('user.wallet.wallet',$data);
    }
    public function withdrawRequest(){
        
        $data['data'] = WithdrawRequest::latest()->get();
        return view('user.wallet.request',$data);
    }
    
    public function transactions(){
        $data['wallet'] = UserWallet::where('user_id',auth()->user()->id)->where('user_role',auth()->user()->role)->first();
        $data['data'] = TrHistory::where('wallet_id',$data['wallet']->id)->orderBy('id','desc')->get();
        return view('user.wallet.index',$data);
    }
    public function withdrawRequestApprove(Request $reqeust){
        $id = $reqeust->get('id');
        $result = WithdrawRequest::find($id);
        $wallet = UserWallet::find($result->wallet_id);
        if($wallet->amount < $result->amount){
            return redirect()->back()->withError('User wallet does not have sufficient balance');
        }
        $tds = 10;
        $medySevaTds = 0;
        if($result->amount > 15000){
            $medySevaTds = ($result->amount * 10 ) / 100;   
        }
        if($medySevaTds > 0) {
            TrHistory::create([
                'wallet_id' => 4,
                'user_id' => 1,
                'from_wallet' => $result->wallet_id,
                'to_wallet' => 4,
                'user_role' => 'admin',
                'amount' => $medySevaTds,
                'category' => 'tds'
            ]);
            
            // update admin wallet
            $updateAdminWallet = UserWallet::find(4);
            $updateAdminWallet->amount += $medySevaTds;
            $updateAdminWallet->save();
            
             // minus vle amount
            TrHistory::create([
                'wallet_id' =>  $result->wallet_id,
                'user_id' =>  $result->user_id,
                'from_wallet' => $result->wallet_id,
                'to_wallet' => 4,
                'user_role' => $result->user_role,
                'amount' => $medySevaTds,
                'category' => 'tds'
            ]);
        }
       
        
        TrHistory::create([
            'wallet_id' =>  $result->wallet_id,
            'user_id' =>  $result->user_id,
            'from_wallet' => $result->wallet_id,
            'to_wallet' => 0,
            'user_role' => $result->user_role,
            'amount' => $result->amount - $medySevaTds,
            'category' => 'withdraw'
        ]);
        
        // update vle wallet
        $updateAdminWallet = UserWallet::find( $result->wallet_id);
        $amount = $updateAdminWallet->amount;
        $amount = $amount - $result->amount;
        $updateAdminWallet->amount = $amount;
        $updateAdminWallet->save();
        
        // update request
        $result->status = "approved";
        $result->approve_date = date('Y-m-d H:i:s');
        $result->tds = $medySevaTds;
        $result->save();
        
        return redirect()->back()->withSuccess('Withdraw request approved sucessfully');
    }
    
    public function withdrawRequestReject(Request $request){
         $result = WithdrawRequest::find($request->get('id'));
         $result->reason = $request->get('reason');
         $result->status = 'rejected';
         $result->save();
         return redirect()->back()->withSuccess('Withdraw request rejected sucessfully');
    }
    
    public function viewRejectReason(Request $request){
        $id = $request->get('id');
        $wallet = WithdrawRequest::find($request->get('id'));
        return response(['status' => 1,'data' => $wallet->reason]);
    }
    
    public function viewTrx($id){
        $data = TrHistory::findOrFail($id);
        $data1['trxData'] = TrHistory::where('trx_id',$data->trx_id)->get();
        
        $data1['data'] = $data;
        
        return view('user.wallet.trx-view',$data1);
    }
    public function withdrawRequestView($id){
        $data['data'] = WithdrawRequest::find($id);
        $user = null;
        if($data['data']->user_role == "vle"){
            $user = VleUser::find($data['data']->user_id);
        } else{
            $user = User::find($data['data']->user_id);
        }
        $tds = 0;
        if($data['data']->amount > 15000 && $data['data']->tds <= 0){
            $tds = ($data['data']->amount * 10) / 100;
            $data['data']->tds = $tds;
        }
        $data['user']  = $user;
        return view('user.wallet.request_view',$data);
    }
    public function approvalConfirm(Request $request){
        $id = $request->get('id');
        $result = WithdrawRequest::find($request->get('id'));
        $tds = 0;
        if($result->amount > 15000){
            $tdsPercent = 10;
            $tds = ($result->amount * $tdsPercent ) / 100;
        }
        $total = $result->amount - $tds;
        
        // user wallet
        $UserWallet = UserWallet::find( $result->wallet_id);
        $currentAmount = $UserWallet->amount;
        $data['currentAmount'] = $currentAmount;
        $data['amount'] = $result->amount;
        $data['tds'] = $tds;
        $data['withdrawAble'] = $result->amount - $tds;
        
        $view = view('user.wallet.approve_ajax',$data)->render();
        $approve = true;
        if($currentAmount < ($result->amount - $tds)){
            $approve = false;
        }
         return response(['status' => 1, 'data' => $view,'approve' => $approve]);
    }
}
