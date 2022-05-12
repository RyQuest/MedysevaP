<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VleUser;
use App\Models\User;
use App\Models\Staff;

use App\Models\Chamber;
use App\Models\TrHistory;
use App\Models\UserWallet;
use App\Mail\VleRegister;
use App\Models\PartnerInvoice;
use App\Models\VleLoginCount;

use App\Imports\VleImport;
use App\Exports\VleSessionExport;


class VleController extends Controller
{
    //
    public function index(Request $request){
        if($request->get('start_date') && $request->get('end_date')){
            \Session::put('export_start_date',$request->get('start_date'));
            \Session::put('export_end_date',$request->get('end_date'));
            return \Excel::download(new VleImport(), 'vle.xlsx');
        }
        $data['data'] = VleUser::where('added_by',auth()->user()->id)->where('added_by_role','partner')->latest()->get();
        return view('user.vle.index',$data);
    }
    
    public function add(){
        $data['chamber'] = Chamber::where('name','like','NICT%')->get();
        return view('user.vle.add',$data);
    }
    public function create(Request $request){
        \DB::beginTransaction();
        $validator = \Validator::make($request->all(),[
                'chamber' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:vle_users',
                'register_fee' => 'required',
                //'confirm_register_fee' => 'required',
                'adhar_front' => 'required|mimes:jpeg,jpg,png,gif,pdf|max:2048',
                'adhar_back' => 'required|mimes:jpeg,jpg,png,gif,pdf|max:2048',
                'pan_front' => 'required|mimes:jpeg,jpg,png,gif,pdf|max:2048',
                'pan_back' => 'required|mimes:jpeg,jpg,png,gif,pdf|max:2048',
                'marksheet' => 'required|mimes:jpeg,jpg,png,gif,pdf|max:2048',
                'address_proof' => 'required',
                'address_proof_copy' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            ]);
        if($validator->fails()){
            return redirect()->back()->withError($validator->errors()->first())->withInput();
        }
        $hasUser = User::where('email',$request->get('email'))->first();
        if(null != $hasUser){
            return redirect()->back()->withError('Email already taken')->withInput();
        }
        
        $hasUser = Staff::where('email',$request->get('email'))->first();
        if(null != $hasUser){
            return redirect()->back()->withError('Email already taken')->withInput();
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
        $adhar_front = "";
        $adhar_back = "";
        $pan_front = "";
        $pan_back = "";
        $marksheet = "";
        $address_proof_copy = "";

        if($request->hasFile('adhar_front')){
            $adhar_front = $request->file('adhar_front')->store('kyc','public');
        }
        
        if($request->hasFile('adhar_back')){
            $adhar_back = $request->file('adhar_back')->store('kyc','public');
        }
        
        if($request->hasFile('pan_front')){
            $pan_front = $request->file('pan_front')->store('kyc','public');
        }
        
        if($request->hasFile('pan_back')){
            $pan_back = $request->file('pan_back')->store('kyc','public');
        }
        
        if($request->hasFile('marksheet')){
            $marksheet = $request->file('marksheet')->store('kyc','public');
        }
        
        if($request->hasFile('address_proof_copy')){
            $address_proof_copy = $request->file('address_proof_copy')->store('kyc','public');
        }
        
        $pwd = "12345678";//\Str::random(8);
       $vleCreate  = VleUser::create([
                'chamber_id' => $chamber_id,
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => \Hash::make($pwd),
                'role' => 'vle',
                'added_by' => auth()->user()->id,
                'added_by_role' => 'partner',
                'aadhar_front' => $adhar_front,
                'aadhar_back' => $adhar_back,
                'pan_front' => $pan_front,
                'pan_back' => $pan_back,
                'marksheet' => $marksheet,
                'address_proof_copy' => $address_proof_copy,
                'address_proof' => $request->get('address_proof'),
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
            'from_wallet' => $authWallet->id,
            'to_wallet' => $authWallet->id,
            'user_role' => 'partner',
            'amount' => $register_fee,
            'category' => 'register_fee',
            'current_amount' => $authWallet->amount + $register_fee,
            'vle_id' => $vleCreate->id,
         ]);
         
        //  // minus amount from partner wallet
        // TrHistory::create([
        //     'wallet_id' => $authWallet->id,
        //     'user_id' => auth()->user()->id,
        //     'from_wallet' => $authWallet->id,
        //     'to_wallet' => 4,
        //     'user_role' => 'partner',
        //     'amount' => $register_fee,
        //     'category' => 'register_fee_out',
        //     'current_amount' => $authWallet->amount,
        //     'vle_id' => $vleCreate->id,
        //  ]);
         
        
        $loginUserAmt = $authWallet->amount + $register_fee;
        $adminWallet = UserWallet::where('id',4)->first();
        
        $gst = ($register_fee * 18) / 100;
        
        $r_amount = $register_fee - $gst;
        $adminAmt = $adminWallet->amount + $r_amount;
        $loginUserAmt = $loginUserAmt - $r_amount;
        
        $trx_id = uniqid();
        TrHistory::create([
            'wallet_id' => 4,
            'trx_id' => $trx_id,
            'user_id' => 1,
            'from_wallet' => $authWallet->id,
            'to_wallet' => 4,
            'user_role' => 'admin',
            'amount' => $r_amount,
            'category' => 'register_fee',
            'current_amount' => $loginUserAmt,
            'receiver_amount' => $adminAmt, 
            'vle_id' => $vleCreate->id,
         ]);
         
        $adminAmt = $adminAmt + $gst;
        $loginUserAmt = $loginUserAmt - $gst;
        
        TrHistory::create([
            'wallet_id' => 4,
            'trx_id' => $trx_id,
            'user_id' => 1,
            'from_wallet' => $authWallet->id,
            'to_wallet' => 4,
            'user_role' => 'admin',
            'amount' => $gst,
            'category' => 'gst',
            'current_amount' => $loginUserAmt,
            'receiver_amount' => $adminAmt, 
            'vle_id' => $vleCreate->id,
         ]);
            
        // update admin wallet
        $updateAdminWallet = UserWallet::find(4);
        $updateAdminWallet->amount += $register_fee;
        $updateAdminWallet->save();
        
        // send email
        $vleCreate->password = $pwd;
        // \Mail::to($vleCreate->email)->send(new VleRegister($vleCreate));
        PartnerInvoice::create([
            'user_id' => auth()->user()->id,
            'vle_id' => $vleCreate->id,
            'amount' => 300,
            'gst' => 54,
            'total' => 354,
            'status' => 'pending'
        ]);
        \DB::commit();
        return redirect()->to('/vle')->withSuccess('Vle added successfully');
    }
    
    public function viewVle($id){
        $vle = VleUser::find($id);
        if(null == $vle){
            abort(404);
        }
        $data['data'] = $vle;
        $data['loginData'] = VleLoginCount::where('user_id',$vle->id)->get();
        return view('user.vle.view',$data);
        
    }
    
    
    public function VleSession(Request $request){
        $user_id = $request->get('user');
        if($request->get('start_date') && $request->get('end_date')){
            \Session::put('export_start_date',$request->get('start_date'));
            \Session::put('export_end_date',$request->get('end_date'));
            return \Excel::download(new VleSessionExport(), 'vle_session.xlsx');
        }
        if($user_id){
            $data['data'] = VleLoginCount::select('session_count.id','ip_address','user_id','vle_users.name','session_count.created_at as date', \DB::raw('DATE_FORMAT(session_count.created_at, "%Y-%m-%d") as created_at'), \DB::raw('count(session_count.id) as total'))
            ->join('vle_users','vle_users.id','=','session_count.user_id')
                 ->where('user_id',$user_id)
                 ->groupBy(['user_id','created_at'])
                 ->get();
        } else{
            $data['data'] = VleLoginCount::select('session_count.id','ip_address','user_id','vle_users.name','session_count.created_at as date', \DB::raw('DATE_FORMAT(session_count.created_at, "%Y-%m-%d") as created_at'), \DB::raw('count(session_count.id) as total'))
            ->join('vle_users','vle_users.id','=','session_count.user_id')
                 ->groupBy(['user_id','created_at'])
                 ->get();
        }
    
        return view('user.vle.sessionList',$data);
    }
    
    public function viewVleSession(Request $request,$id,$date){
        if($request->get('start_date') && $request->get('end_date')){
            \Session::put('export_start_date',$request->get('start_date'));
            \Session::put('export_end_date',$request->get('end_date'));
            return \Excel::download(new VleSessionExport(), 'vle_session.xlsx');
        }
        
        $data['vle'] = VleUser::find($id);
        $data['data'] = VleLoginCount::where('user_id',$id)->whereDate('created_at',$date)->get();
        return view('user.vle.viewSession',$data);
    }
}

?>