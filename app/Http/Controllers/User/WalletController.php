<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\TopUpRequestImport;
use App\Imports\TransactionImport;
use App\Imports\WithdrawRequestImport;
use App\Models\UserWallet;
use App\Models\WithdrawRequest;
use App\Models\TrHistory;
use App\Models\VleUser;
use App\Models\User;
use App\Models\Invoices;
use App\Models\TopupRequest;
use DB;

class WalletController extends Controller
{
    //
    public function index()
    {

        $data['wallet'] = UserWallet::where('user_id', auth()->user()->id)->where('user_role', auth()->user()->role)->first();
        $data['data'] = TrHistory::where('to_wallet', $data['wallet']->id)->orWhere('from_wallet', $data['wallet']->id)->orderBy('id', 'desc')->limit('10')->get();

        return view('user.wallet.wallet', $data);
    }
    public function withdrawRequest(Request $request)
    {
        if ($request->get('start_date') && $request->get('end_date')) {
            \Session::put('export_start_date', $request->get('start_date'));
            \Session::put('export_end_date', $request->get('end_date'));
            return \Excel::download(new WithdrawRequestImport(), 'withdraw_request.xlsx');
        }

        $data['data'] = WithdrawRequest::select('withdraw_request.*', 'vle_users.id as vle_id')
            ->join('vle_users', 'vle_users.id', '=', 'withdraw_request.user_id')
            ->where('vle_users.added_by_role', 'partner')
            ->where('vle_users.added_by', auth()->user()->id)
            ->latest()->get();
        return view('user.wallet.request', $data);
    }

    public function transactions(Request $request)
    {
        if ($request->get('start_date') && $request->get('end_date')) {
            \Session::put('export_start_date', $request->get('start_date'));
            \Session::put('export_end_date', $request->get('end_date'));
            return \Excel::download(new TransactionImport(), 'withdraw_request.xlsx');
        }

        $data['wallet'] = UserWallet::where('user_id', auth()->user()->id)->where('user_role', auth()->user()->role)->first();
        $data['data'] = TrHistory::where('to_wallet', $data['wallet']->id)->orWhere('from_wallet', $data['wallet']->id)->orderBy('id', 'desc')->get();
        return view('user.wallet.index', $data);
    }
    public function withdrawRequestApprove(Request $reqeust)
    {
        $id = $reqeust->get('id');
        $result = WithdrawRequest::find($id);
        $wallet = UserWallet::find($result->wallet_id);
        if ($wallet->amount < $result->amount) {
            return redirect()->back()->withError('User wallet does not have sufficient balance');
        }
        $tds = 10;
        $medySevaTds = 0;
        if ($result->amount > 15000) {
            $medySevaTds = ($result->amount * 10) / 100;
        }

        $adminWallet = UserWallet::find(4);


        if ($medySevaTds > 0) {
            TrHistory::create([
                'wallet_id' => 4,
                'user_id' => 1,
                'from_wallet' => $result->wallet_id,
                'to_wallet' => 4,
                'user_role' => 'admin',
                'amount' => $medySevaTds,
                'category' => 'tds',
                'receiver_amount' => $adminWallet->amount + $medySevaTds,
                'current_amount' => $wallet->amount - $medySevaTds,
            ]);

            // update admin wallet
            $updateAdminWallet = UserWallet::find(4);
            $updateAdminWallet->amount += $medySevaTds;
            $updateAdminWallet->save();

            // minus vle amount
            // TrHistory::create([
            //     'wallet_id' =>  $result->wallet_id,
            //     'user_id' =>  $result->user_id,
            //     'from_wallet' => $result->wallet_id,
            //     'to_wallet' => 4,
            //     'user_role' => $result->user_role,
            //     'amount' => $medySevaTds,
            //     'category' => 'tds',
            //     'current_amount' => $wallet->amount,
            // ]);
        }


        TrHistory::create([
            'wallet_id' =>  $result->wallet_id,
            'user_id' =>  $result->user_id,
            'from_wallet' => $result->wallet_id,
            'to_wallet' => 0,
            'user_role' => $result->user_role,
            'amount' => $result->amount - $medySevaTds,
            'category' => 'withdraw',
            'current_amount' => ($wallet->amount - $result->amount),
        ]);

        // update vle wallet
        $updateAdminWallet = UserWallet::find($result->wallet_id);
        $amount = $updateAdminWallet->amount;
        $amount = $amount - $result->amount;
        $updateAdminWallet->amount = $amount;
        $updateAdminWallet->save();

        // update request
        $userwallet = UserWallet::find($result->wallet_id);
        $result->status = "approved";
        $result->current_amount = $userwallet->amount;
        $result->approve_date = date('Y-m-d H:i:s');
        $result->bank_narration = $reqeust->get('bank_narration');
        $result->utr_no = $reqeust->get('utr_no');
        $result->date_of_payment = $reqeust->get('date_of_payment');
        $result->save();

        return redirect()->back()->withSuccess('Withdraw request approved sucessfully');
    }

    public function withdrawRequestReject(Request $request)
    {
        $result = WithdrawRequest::find($request->get('id'));
        $result->reason = $request->get('reason');
        $result->approve_date = date('Y-m-d H:i:s');
        $result->status = 'rejected';
        $result->save();
        return redirect()->back()->withSuccess('Withdraw request rejected sucessfully');
    }

    public function viewRejectReason(Request $request)
    {
        $id = $request->get('id');
        $wallet = WithdrawRequest::find($request->get('id'));
        return response(['status' => 1, 'data' => $wallet->reason]);
    }

    public function viewTrx($id)
    {
        $data = TrHistory::findOrFail($id);
        $data1['trxData'] = TrHistory::where('trx_id', $data->trx_id)->get();

        $data1['data'] = $data;

        return view('user.wallet.trx-view', $data1);
    }
    public function withdrawRequestView($id)
    {
        $data['data'] = WithdrawRequest::find($id);
        $user = null;
        if ($data['data']->user_role == "vle") {
            $user = VleUser::find($data['data']->user_id);
        } else {
            $user = User::find($data['data']->user_id);
        }
        $tds = 0;
        if ($data['data']->amount > 15000 && $data['data']->tds <= 0) {
            $tds = ($data['data']->amount * 10) / 100;
            $data['data']->tds = $tds;
        }
        $data['user']  = $user;
        return view('user.wallet.request_view', $data);
    }
    public function approvalConfirm(Request $request)
    {
        $id = $request->get('id');
        $result = WithdrawRequest::find($request->get('id'));
        $tds = 0;
        if ($result->amount > 15000) {
            $tdsPercent = 10;
            $tds = ($result->amount * $tdsPercent) / 100;
        }
        $total = $result->amount - $tds;

        // user wallet
        $UserWallet = UserWallet::find($result->wallet_id);
        $currentAmount = $UserWallet->amount;
        $data['currentAmount'] = $currentAmount;
        $data['amount'] = $result->amount;
        $data['tds'] = $tds;
        $data['withdrawAble'] = $result->amount - $tds;

        $view = view('user.wallet.approve_ajax', $data)->render();
        $approve = true;
        if ($currentAmount < ($result->amount - $tds)) {
            $approve = false;
        }
        return response(['status' => 1, 'data' => $view, 'approve' => $approve]);
    }

    public function topupRequest(Request $request)
    {
        if ($request->get('start_date') && $request->get('end_date')) {
            \Session::put('export_start_date', $request->get('start_date'));
            \Session::put('export_end_date', $request->get('end_date'));
            return \Excel::download(new TopUpRequestImport(), 'topuprequest.xlsx');
        }
        $data['data'] = TopupRequest::select('topup_request.*', 'vle_users.name')
            ->join('vle_users', 'vle_users.id', '=', 'topup_request.user_id')
            ->where('vle_users.added_by', auth()->user()->id)
            ->where('vle_users.added_by_role', 'partner')
            ->latest()
            ->get();
        return view('user.wallet.topup_request', $data);
    }

    public function topupRequestView($id)
    {
        $data['data'] = TopupRequest::findOrFail($id);
        if ($data['data']->user_role == "vle") {
            $data['user'] = VleUser::find($data['data']->user_id);
        } else {
            $data['user'] = User::find($data['data']->user_id);
        }
        return view('user.wallet.topup_request_view', $data);
    }

    public function topupRequestReject(Request $request)
    {
        $result = TopupRequest::find($request->get('id'));
        $result->reason = $request->get('reason');
        $result->status = 'rejected';
        $result->save();
        return redirect()->back()->withSuccess('Topup request rejected sucessfully');
    }

    public function approveTopupRequest(Request $request)
    {
        try {
            \DB::beginTransaction();
            $request_id = $request->get('request_id');
            $result = TopupRequest::findOrFail($request_id);

            $user_wallet = UserWallet::find($result->wallet_id);

            $auth_wallet = UserWallet::find(5);

            TrHistory::create([
                'wallet_id' =>  $result->wallet_id,
                'user_id' =>  $result->user_id,
                'from_wallet' => 5,
                'to_wallet' => $result->wallet_id,
                'user_role' => 'vle',
                'amount' => $result->amount,
                'category' => 'topup_recharge',
                'current_amount' => $auth_wallet->amount - $result->amount,
                'receiver_amount' => $user_wallet->amount + $result->amount
            ]);

            // update vle wallet
            $updateAdminWallet = UserWallet::find($result->wallet_id);
            $amount = $updateAdminWallet->amount;
            $amount = $amount + $result->amount;
            $updateAdminWallet->amount = $amount;
            $updateAdminWallet->save();

            $result->status = "approved";
            $result->current_amount = $user_wallet->amount + $result->amount;
            $result->approve_date = date('Y-m-d H:i:s');

            $result->save();

            \DB::commit();
            return redirect()->back()->withSuccess('Topup request approved sucessfully');
        } catch (\Exception $ex) {
            \DB::rollback();
            // dd($ex->getLine());
            return redirect()->back()->withError($ex->getMessage());
        }
    }

    public function MytopupRequest()
    {
        $wallet_id = 5;
        $data['topupRequest'] = TopupRequest::where('wallet_id', $wallet_id)->get();
        return view('user.wallet.my_topup', $data);
    }

    public function applyTopup(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $call = apiUrl()."/api/image_upload";
        $response = $client->request('POST', $call,[
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => file_get_contents($request->file('deposit_slip')->getPathname()),
                    'filename' => 'file.' . $request->file('deposit_slip')->getClientOriginalExtension()                ]
            ]
        ]);
        $response =  json_decode($response->getBody()->getContents(),true);
        
        $userwallet = UserWallet::where('user_id', auth()->user()->id)->where('user_role', auth()->user()->role)->first();
        TopupRequest::create([
            'wallet_id' => $userwallet->id,
            'user_id' => auth()->user()->id,
            'user_role' => auth()->user()->role,
            'amount' => $request->get('amount'),
            'utr_no' => $request->get('utr_no'),
            'deposit_slip' => "uploads/files/".$response['file_name'], //$request->get('deposit_slip'),
            'status' => 'pending',
            'current_amount' => $userwallet->amount
        ]);
        return redirect()->back()->withSuccess('Topup request send sucessfully');
    }

    public function MywithdrawRequest()
    {
        $wallet_id = 5;
        $data['data'] = WithdrawRequest::where('wallet_id', $wallet_id)->get();
        return view('user.wallet.my_withdraw', $data);
    }

    public function applyWithdraw(Request $request)
    {
        $userwallet = UserWallet::where('user_id', auth()->user()->id)->where('user_role', auth()->user()->role)->first();
        if ($userwallet->amount < $request->get('amount')) {
            return redirect()->back()->withError('Insufficient wallet balance');
        }
        WithdrawRequest::create([
            'wallet_id' => $userwallet->id,
            'user_id' => auth()->user()->id,
            'user_role' => auth()->user()->role,
            'amount' => $request->get('amount'),
            'current_amount' => $userwallet->amount
        ]);

        return redirect()->back()->withSuccess('Withdraw request send sucessfully');
    }
}
