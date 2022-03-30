<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoices;
use App\Models\InvoiceItem;
use App\Models\PaymentUser;
use DB;

class InvoiceController extends Controller
{
    //
    public function index(){
        $data['data'] = Invoices::select('invoices.*','patientses.name as patient_name','patientses.sex','patientses.dob')
        ->join('patientses','invoices.patient_id','=','patientses.id')
        ->latest()->get();
        return view('user.invoices.index',$data);
    }
    
    public function transactions(Request $request){
        $data['data'] = PaymentUser::select('payment_user.*','patientses.name as patient_name','chamber.name as chamber_name')
        ->join('patientses','payment_user.patient_id','=','patientses.id')
        ->join('chamber','payment_user.chamber_id','=','chamber.uid')
        ->orderBy('payment_user.id','desc')
        ->get();
        return view('user.invoices.transactions',$data);
    }
    public function view($id){
        $data['data'] = Invoices::select('invoices.*','patientses.name as patient_name','patientses.sex','patientses.dob','patientses.mobile')
        ->leftJoin('patientses','patientses.id','=','invoices.patient_id')
        ->where('invoices.id',$id)
        ->first();
        $data['items'] = InvoiceItem::where('invoice_id',$data['data']->invoice_id)->get();
        return view('user.invoices.view',$data);
    }
}

?>