<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Educations;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /* get Doctor profile data */
    public function profile(Request $request){
        $user_id = $request->input('user_id');
        $user = User::with(['educations', 'experiences', 'profile'])->where('id',$user_id)->first();
        if(!empty($user)){
            return response(['status' => 1,'data' => $user]);
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    /* update user profile */
    public function profileUpdate(Request $request){
        $user_id = $request->input('user_id');
        $user = User::where('id',$user_id)->first();
        if(!empty($user)){
            $user->name         = $request->input('name');
            $user->specialist   = $request->input('specialist');
            $user->degree       = $request->input('degree');
            $user->address      = $request->input('address');
            $user->skype        = $request->input('skype');
            $user->whatsapp     = $request->input('whatsapp');
            $user->phone        = $request->input('phone');
            $user->exp_years    = $request->input('exp_years');
            $user->about_me     = $request->input('about_me');
            $user->email        = $request->input('email');
            $user->facebook     = $request->input('facebook');
            $user->twitter      = $request->input('twitter');
            $user->linkedin     = $request->input('linkedin');
            $user->instagram    = $request->input('instagram');
            $user->enable_appointment = $request->input('enable_appointment');

            if($request->hasFile('photo')){
                // $user_photo = $request->file('photo')->store('users','public');
                $path = Storage::putFile('public/users/profile', $request->file('photo'));
                $user_photo = url($path);
                $user->image = $user_photo;
                $user->thumb = $user_photo;
            }
            $res = $user->save();

            if($res = true){
                $user_profile = UserProfile::firstOrNew(['user_id' => $user->id]);
                $user_profile->first_name   =   $request->input('first_name');
                $user_profile->mid_name     =   $request->input('mid_name');
                $user_profile->last_name    =   $request->input('last_name');
                $user_profile->languages    =   $request->input('languages');
                $user_profile->council      =   $request->input('council');
                $user_profile->designation  =   $request->input('designation');
                $user_profile->sub_speciality   =   $request->input('sub_speciality');
                $user_profile->super_speciality =   $request->input('super_speciality');
                $user_profile->super_interest   =   $request->input('super_interest');
                $user_profile->pathy    =   $request->input('pathy');
                $user_profile->state    =   $request->input('state');
                $user_profile->tehsil   =   $request->input('tehsil');
                $user_profile->city     =   $request->input('city');
                $user_profile->country     =   $request->input('country');
                $user_profile->website     =   $request->input('website');
                $user_profile->save();
                $user = User::with(['educations', 'experiences', 'profile'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'User updation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    /* Create user education */
    public function educationAdd(Request $request){
        $user_id = $request->input('user_id');
        $user = User::where('id',$user_id)->first();
        if(!empty($user)){
            $education = new Educations;
            $education->user_id     = $request->input('user_id');
            $education->title       = $request->input('title');
            $education->years       = $request->input('from_years').'-'.$request->input('to_years');
            $education->details     = $request->input('details');
            $res = $education->save();

            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations Creation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
 
    /* Update User education */
    public function educationUpdate(Request $request){
        $user_id = $request->input('user_id');
        $edu_id  = $request->input('edu_id');
        $education = Educations::find($edu_id);
        if(!empty($education)){
            $education->user_id     = $request->input('user_id');
            $education->title       = $request->input('title');
            $education->years       = $request->input('from_years').'-'.$request->input('to_years');
            $education->details     = $request->input('details');
            $res = $education->save();

            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations updation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
 
    /* Delete User education */
    public function educationDelete(Request $request){
        $user_id = $request->input('user_id');
        $edu_id  = $request->input('edu_id');
        $education = Educations::find($edu_id);
        if(!empty($education)){
            $res = $education->delete();
            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations updation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
    
    /* Create user experience */
    public function experienceAdd(Request $request){
        $user_id = $request->input('user_id');
        $user = User::where('id',$user_id)->first();
        if(!empty($user)){
            $experience = new Educations;
            $experience->user_id     = $request->input('user_id');
            $experience->title       = $request->input('title');
            $experience->years       = $request->input('from_years').'-'.$request->input('to_years');
            $experience->details     = $request->input('details');
            $res = $experience->save();

            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations Creation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
 
    /* Update User experience */
    public function experienceUpdate(Request $request){
        $user_id = $request->input('user_id');
        $exp_id  = $request->input('exp_id');
        $experience = Educations::find($exp_id);
        if(!empty($experience)){
            $experience->user_id     = $request->input('user_id');
            $experience->title       = $request->input('title');
            $experience->years       = $request->input('from_years').'-'.$request->input('to_years');
            $experience->details     = $request->input('details');
            $res = $experience->save();

            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations updation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }
 
    /* Delete User experience */
    public function experienceDelete(Request $request){
        $user_id = $request->input('user_id');
        $exp_id  = $request->input('exp_id');
        $experience = Educations::find($exp_id);
        if(!empty($experience)){
            $res = $experience->delete();
            if($res){
                $user = User::with(['educations', 'experiences'])->find($user_id);
                return response(['status' => 1,'data' => $user]);
            }else{
                return response(['status' => 1, 'data' => '', 'msg' => 'Educations updation Failed']);
            }
        }else{
            return response(['status' => 1,'data' => '']);
        }
    }


    public function create(Request $request){
        $user_id = $request->input('user_id');
        $user_role = $request->input('user_role');
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
            return response(['status' => 1,'data' => [], 'msg' => $validator->messages() ]);
        }
        
        $hasUser = User::where('email',$request->get('email'))->first();
        if(null != $hasUser){
            return response(['status' => 1,'data' => [], 'msg' =>['email'=>['The email has already been taken.']] ]);
        }
        
        $hasUser = Staff::where('email',$request->get('email'))->first();
        if(null != $hasUser){
            return response(['status' => 1,'data' => [], 'msg' =>['email'=>['The email has already been taken.']] ]);
        }
        
        $chamber_id = $request->get('chamber');
        
        $chamber = Chamber::find($chamber_id);
        
        if(null == $chamber){
             return response(['status' => 1,'data' => [], 'msg' =>['error'=>['chamber not found.']] ]);
        }
        
        $vleUser = VleUser::where('chamber_id',$chamber_id)->count();

        if($vleUser > 1){
            return response(['status' => 1,'data' => [], 'msg' =>['error'=>['VLE already added into chamber']] ]);
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
        
        $pwd = \Str::random(8);
        $vleCreate  = VleUser::create([
                'chamber_id' => $chamber_id,
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => \Hash::make($pwd),
                'role' => 'vle',
                'added_by' => $user_id,
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
        $authWallet = UserWallet::where('user_id', $user_id)->where('user_role', $user_role)->first();
        $register_fee = $request->get('register_fee');
        
        // add amount to partner wallet
        TrHistory::create([
            'wallet_id'     => $authWallet->id,
            'user_id'       => $user_id,
            'from_wallet'   => $authWallet->id,
            'to_wallet'     => $authWallet->id,
            'user_role'     => 'partner',
            'amount'        => $register_fee,
            'category'      => 'register_fee',
            'current_amount' => $authWallet->amount + $register_fee,
            'vle_id'         => $vleCreate->id,
         ]);
         
        //  // minus amount from partner wallet
        // TrHistory::create([
        //     'wallet_id' => $authWallet->id,
        //     'user_id' => $user_id,
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
            'user_id'   => $user_id,
            'vle_id'    => $vleCreate->id,
            'amount'    => 300,
            'gst'       => 54,
            'total'     => 354,
            'status'    => 'pending'
        ]);
        \DB::commit();
        
        return response(['status' => 1,'data' => $vleCreate ]);
    }
    
    public function viewVle(Request $request){
        $vle_user_id = $request->input('vle_user_id');
        $vle = VleUser::find($vle_user_id);
        if(null == $vle){
            return response(['status' => 1,'data' => [], 'msg' =>['error'=>['VLE not found']] ]);
        }
        $data['vle'] = $vle;
        $data['loginData'] = VleLoginCount::where('user_id',$vle->id)->get();
        return response(['status' => 1,'data' => $data ]);
        
    }
    
    
    public function VleSession(Request $request){
        $user_id = $request->get('user_id');
        /*if($request->get('start_date') && $request->get('end_date')){
            \Session::put('export_start_date',$request->get('start_date'));
            \Session::put('export_end_date',$request->get('end_date'));
            return \Excel::download(new VleSessionExport(), 'vle_session.xlsx');
        }*/
        if($user_id){
            $data['session'] = VleLoginCount::select('session_count.id','ip_address','user_id','vle_users.name','session_count.created_at as date', \DB::raw('DATE_FORMAT(session_count.created_at, "%Y-%m-%d") as created_at'), \DB::raw('count(session_count.id) as total'))
            ->join('vle_users','vle_users.id','=','session_count.user_id')
                 ->where('user_id',$user_id)
                 ->groupBy(['user_id','created_at'])
                 ->get();
        } else{
            $data['session'] = VleLoginCount::select('session_count.id','ip_address','user_id','vle_users.name','session_count.created_at as date', \DB::raw('DATE_FORMAT(session_count.created_at, "%Y-%m-%d") as created_at'), \DB::raw('count(session_count.id) as total'))
            ->join('vle_users','vle_users.id','=','session_count.user_id')
                 ->groupBy(['user_id','created_at'])
                 ->get();
        }
    
        return response(['status' => 1,'data' => $data ]);
    }
    
    public function viewVleSession(Request $request){
        $user_id = $request->input('user_id');
        $date    = $request->input('date');

        /*if($request->get('start_date') && $request->get('end_date')){
            \Session::put('export_start_date',$request->get('start_date'));
            \Session::put('export_end_date',$request->get('end_date'));
            return \Excel::download(new VleSessionExport(), 'vle_session.xlsx');
        }*/
        
        $data['vle'] = VleUser::find($user_id);
        $data['session'] = VleLoginCount::where('user_id',$user_id)->whereDate('date',$date)->get();
        return response(['status' => 1,'data' => $data ]);
    }
}

?>