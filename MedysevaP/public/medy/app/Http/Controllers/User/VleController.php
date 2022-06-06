<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VleUser;
use App\Models\Chamber;
use App\Models\TrHistory;
use App\Models\UserWallet;

class VleController extends Controller
{
    //
    public function index(){
        $data['data'] = VleUser::where('added_by',auth()->user()->id)->where('added_by_role','partner')->latest()->get();
        return view('user.vle.index',$data);
    }
    
    public function add(){
        $data['chamber'] = Chamber::all();
        return view('user.vle.add',$data);
    }
    public function create(Request $request){
        \DB::beginTransaction();
        $validator = \Validator::make($request->all(),[
                'chamber' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:vle_users',
                'register_fee' => 'required|same:confirm_register_fee',
                'confirm_register_fee' => 'required'
            ]);
        if($validator->fails()){
            return redirect()->back()->withError($validator->errors()->first())->withInput();
        }
        $chamber_id = $request->get('chamber');
        $chamber = Chamber::find($chamber_id);
        if(null == $chamber){
             return redirect()->back()->withError('Chamber not found')->withInput();
        }
        $vleUser = VleUser::where('chamber_id',$chamber_id)->count();
        if($vleUser > 1){
             return redirect()->back()->withError('VLE already added into chamber')->withInput();
        }
       $vleCreate  = VleUser::create([
                'chamber_id' => $chamber_id,
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => \Str::random(8),//Hash::make(str_random(8)),
                'role' => 'vle',
                'added_by' => auth()->user()->id,
                'added_by_role' => 'partner',
           ]); 
        
        // create wallet
        UserWallet::create([
            'user_id' => $vleCreate->id,
            'user_role' => 'vle',
            'amount' => 0,
        ]);
        
        
        // update admin wallet
        $authWallet = UserWallet::where('user_id',auth()->user()->id)->where('user_role',auth()->user()->role)->first();
        $register_fee = $request->get('register_fee');
        
        // add amount to partner wallet
        TrHistory::create([
            'wallet_id' => $authWallet->id,
            'user_id' => auth()->user()->id,
            'from_wallet' => 0,
            'to_wallet' => $authWallet->id,
            'user_role' => 'partner',
            'amount' => $register_fee,
            'category' => 'register_fee'
         ]);
         
         // minus amount from partner wallet
        TrHistory::create([
            'wallet_id' => $authWallet->id,
            'user_id' => auth()->user()->id,
            'from_wallet' => $authWallet->id,
            'to_wallet' => 4,
            'user_role' => 'partner',
            'amount' => $register_fee,
            'category' => 'register_fee_out'
         ]);
         
        
        $gst = ($register_fee * 18) / 100;
        TrHistory::create([
            'wallet_id' => 4,
            'user_id' => 1,
            'from_wallet' => $authWallet->id,
            'to_wallet' => 4,
            'user_role' => 'admin',
            'amount' => $register_fee - $gst,
            'category' => 'register_fee'
         ]);
         
          TrHistory::create([
            'wallet_id' => 4,
            'user_id' => 1,
            'from_wallet' => $authWallet->id,
            'to_wallet' => 4,
            'user_role' => 'admin',
            'amount' => $gst,
            'category' => 'gst'
         ]);
            
        // update admin wallet
        $updateAdminWallet = UserWallet::find(4);
        $updateAdminWallet->amount += $register_fee;
        $updateAdminWallet->save();
        
        \DB::commit();
        return redirect()->to('/vle')->withSuccess('Vle added successfully');
    }
}

?>