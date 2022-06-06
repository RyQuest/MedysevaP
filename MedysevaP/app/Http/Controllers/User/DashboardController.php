<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patients;
use App\Models\Chamber;
use App\Models\VleUser;
use App\Models\UserWallet;
use App\Models\Invoices;
use App\Models\InvoiceItem;
use App\Models\Appointment;
use App\Models\TrHistory;
use DB;

class DashboardController extends Controller
{
    //
    public function index(){
        
        $data['todayPatient'] = Patients::whereDate('created_at',date('Y-m-d'))->count();
        $data['totalPatient'] = Patients::count();
        $data['vleUser'] = VleUser::where('added_by',auth()->user()->id)->where('added_by_role','partner')->count();
        $data['userWallet'] = UserWallet::where('id',5)->first();
        
        $data['dueInvoice'] = Invoices::select('invoices.*','chamber.name as chamber_name','patientses.name as pt_name','patientses.sex')
            ->join('chamber','invoices.chamber_id','=','chamber.uid')
            ->join('patientses','invoices.patient_id','=','patientses.id')
            ->where('paymant_status','pending')
            ->where('total','>',0)
            ->limit(10)
            ->orderBy('invoices.id','desc')
            ->get();
            
            // get recent visit
        $recentAppointment = Appointment::select('user_id as doctor_id','id as invoice_id','appointment_type','chamber_id','created_at',DB::raw("'appointments' as schema_name"))->where('user_id','!=',null);
        $latestInvoice = Invoices::select('doctor_id','invoice_id','invoice_type as appointment_type','created_at',DB::raw("'invoices' as schema_name"))
            ->where('paymant_status','paid')
            ->where('doctor_id','!=',null);
        $data['recentVisit'] = $recentAppointment->orderBy('id','desc')->limit(6)->get();
        foreach($data['recentVisit'] as $key => $value){
            $doctor_id = $value->doctor_id;
            $doctor = User::where('id',$doctor_id)->first();
            $chamber = Chamber::where('uid',$value->chamber_id)->first();
            // dd($doctor);
            $data['recentVisit'][$key]->doctor_name = isset($chamber->name) ? $chamber->name : "";
            if($value->schema_name == "invoices"){
                $investigation = InvoiceItem::where('invoice_id',$value->invoice_id)->get();
                $items = array();
                foreach($investigation as $item_key => $item){
                    $items[] = $item->name;
                }
                $data['recentVisit'][$key]->investigation = implode(',',$items);   
            } else if($value->appointment_type == 1){
                $data['recentVisit'][$key]->investigation = 'General'; 
            } else if($value->appointment_type == 2){
                $data['recentVisit'][$key]->investigation = 'Specialist'   ;
            } else{
                $data['recentVisit'][$key]->investigation = 'N/A';
            }
        }
        
        
        // get patient count by day
        $maxDays=date('t');
        $currentMonth=date('m');
        $currentYear=date('Y');
        
        $patientGraph = array();
        $patientGraphDay = array();
        
        for($i=1;$i <= $maxDays; $i++){
            $day = $i;
            if($i<=9){
                $day = "0".$i;
            }
            $patientGraph[$i] = Patients::whereYear('created_at','=',$currentYear)->whereMonth('created_at','=',$currentMonth)->whereDay('created_at','=',$day)->count();
            $patientGraphDay[] = $i;
        }
        $data['patientGraph'] = $patientGraph;
        $data['patientGraphDay'] = $patientGraphDay;
        // vle list
        $data['vle'] = VleUser::select('vle_users.*','chamber.name as chamber_name')
            ->join('chamber','chamber.id','=','vle_users.chamber_id')
            ->where('added_by',auth()->user()->id)->where('added_by_role','partner')
        ->get();
        
        // get nict comission
        $nictComission = array();
        $vleComission = array();
        for($i=1;$i<=12;$i++){
            $month = $i;
            if($i<=9){
                $month = "0".$i;
            }
            $d = TrHistory::select('amount')->where('user_id',auth()->user()->id)->whereMonth('created_at','=',$month)->whereYear('created_at','=',date('Y'))->sum('amount');
            $nictComission[$i] = $d;
            
            // get vle comission
            $v = TrHistory::select('amount')->where('user_id',$data['vle'][0]->id)->whereMonth('created_at','=',$month)->whereYear('created_at','=',date('Y'))->whereIn('category',array('appointment_referral','invoice_referral'))->sum('amount');
            $vleComission[$i] = $v;
        }
        
        $data['nictComission'] = $nictComission;
        $data['vleComission'] = $vleComission;
        $data['months'] = array('Jan','Feb','March','April','May','Jun','July','August','September','October','November','December');
        
        // dd($data['recentVisit'] );
        return view('user.dashboard',$data);
    }
    
    public function dashboardVleGraph(Request $request){
        $id = $request->get('id');
        $vleComission = array();
        for($i=1;$i<=12;$i++){
            $month = $i;
            if($i<=9){
                $month = "0".$i;
            }
            
            // get vle comission
            $v = TrHistory::select('amount')->where('user_id',$id)->whereMonth('created_at','=',$month)->whereYear('created_at','=',date('Y'))->whereIn('category',array('appointment_referral','invoice_referral'))->sum('amount');
            $vleComission[$i] = $v;
        }
        return response(['status' => 1,'data' => array_values($vleComission)]);
    }
    
    public function dashboardClinicGraph(Request $request){
        $patientGraphDay = array();
        
        $currentMonth = $request->get('id');
        $currentYear = date('Y');
        $maxDays = cal_days_in_month(CAL_GREGORIAN, $currentMonth, date('Y'));
        
        for($i=1;$i <= $maxDays; $i++){
            $day = $i;
            if($i<=9){
                $day = "0".$i;
            }
            $patientGraph[$i] = Patients::whereYear('created_at','=',$currentYear)->whereMonth('created_at','=',$currentMonth)->whereDay('created_at','=',$day)->count();
            $patientGraphDay[] = $i;
        }
        $data['patientGraph'] = $patientGraph;
        $data['patientGraphDay'] = $patientGraphDay;
        
        return response(['status' => 1,'data' => array_values($patientGraph),'patientGraphDay' => array_values($patientGraphDay)]);
        
    }
    
    public function password(){
        return view('user.password');    
    }
    
    public function passwordUpdate(Request $request){
        $validator = \Validator::make($request->all(),[
            'old_password' => 'required',
            'password' => 'confirmed|required',
            'password_confirmation' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        $user = auth()->user();
        
        if (\Hash::check($request->get('old_password'), $user->password)) { 
            $user = User::find(auth()->user()->id);
            $user->password = \Hash::make($request->get('password'));
            $user->save();
            return redirect()->back()->withSuccess('Password updated successfully')->withInput();
        } else{
            return redirect()->back()->withError('Old Password does not match')->withInput();
        }
    }
    
    public function logout(){
        \Auth::logout();
        return redirect()->to('signin');
    }
}
