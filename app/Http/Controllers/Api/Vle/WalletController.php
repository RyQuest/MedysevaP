<?php

namespace App\Http\Controllers\Api\Vle;

use App\Http\Controllers\Controller;
use App\Models\TrHistory;
use App\Models\UserWallet;
use App\Models\VleUser;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use JWTAuth;
use Config;

class WalletController extends Controller
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

    public function index(Request $request)
    {
        $user_id = $request->input('user_id');
        $limit   = $request->input('limit');
        $offset  = $request->input('offset');

        $user = VleUser::find($request->input('user_id'));
        $data['wallet'] = UserWallet::where('user_id', $user->id)->where('user_role', 'vle')->first();
        $wallet_id = $data['wallet']->id;
        $history = TrHistory::where(function ($query) use ($wallet_id) {
            return $query->orWhere('from_wallet', $wallet_id)
                ->orWhere('to_wallet', $wallet_id);
        })
            ->take($limit)
            ->skip($offset)
            ->latest()
            ->get();

        foreach ($history as $key => $value) {
            $from = getUsername($value->from_wallet);
            $to = getUsername($value->to_wallet);
            if ($value->patient_id) {
                $patientData = patientData($value->patient_id);
                $history[$key]['patient'] = $patientData;
            }
            $history[$key]['from_wallet_name'] = $from;
            $history[$key]['to_wallet_name'] = $to;
        }

        $data['history'] = $history;
        return response(['status' => 1, 'data' => $data]);
    }
    public function withdrawRequest(Request $request)
    {
        // $user = \JWTAuth::parseToken()->authenticate($request->token);
        $res = WithdrawRequest::where('user_id', $request->input('user_id'))->where('user_role', 'vle')->get();

        return response(['status' => 1, 'data' => $res]);
    }

    public function withdrawRequestAdd(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'amount' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response(['status' => 0, 'msg' => $validator->errors()->first()]);
        }

        $user = VleUser::find($request->input('user_id'));
        $user_wallet = UserWallet::where('user_id', $user->id)->where('user_role', 'vle')->first();
        $userWalletAmount = $user_wallet->amount;
        if ($userWalletAmount < $request->get('amount')) {
            return response(['status' => 0, 'msg' => 'Your wallet does not have sufficient balance']);
        }
        WithdrawRequest::create([
            'user_id' => $user->id,
            'user_role' => 'vle',
            'wallet_id' => $userWalletAmount,
            'amount' => $request->get('amount'),
            'current_amount' => $userWalletAmount
        ]);

        return response(['status' => 1, 'msg' => 'Request send successfully']);
    }
}
