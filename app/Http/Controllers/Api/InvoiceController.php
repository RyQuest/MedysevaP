<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\PartnerInvoiceImport;
use App\Models\Invoices;
use App\Models\InvoiceItem;
use App\Models\PaymentUser;
use App\Models\TrHistory;
use DB;

use App\Models\PartnerInvoice;

class InvoiceController extends Controller
{
    //
    public function index(Request $request){
        $offset = $request->input('offset');
        $limit = $request->input('limit');

        $data['data'] = Invoices::select('invoices.*','patientses.name as patient_name','patientses.sex','patientses.dob')
        ->join('patientses','invoices.patient_id','=','patientses.id')
        ->latest()->skip($offset)->take($limit)->get();
        return response(['status' => 1, 'data' => $data] );
    }
    
    public function transactions(Request $request){
        $offset = $request->input('offset');
        $limit = $request->input('limit');

        $data['data'] = PaymentUser::select('payment_user.*','patientses.name as patient_name','chamber.name as chamber_name')
        ->join('patientses','payment_user.patient_id','=','patientses.id')
        ->join('chamber','payment_user.chamber_id','=','chamber.uid')
        ->orderBy('payment_user.id','desc')
        ->skip($offset)->take($limit)->get();
        
        return response(['status' => 1, 'data' => $data] );
    }

    public function view(Request $request){
        $id = $request->input('invoice_id');
        $data['data'] = Invoices::select('invoices.*','patientses.name as patient_name','patientses.sex','patientses.dob','patientses.mobile')
        ->leftJoin('patientses','patientses.id','=','invoices.patient_id')
        ->where('invoices.id',$id)
        ->first();
        $data['items'] = InvoiceItem::where('invoice_id',$data['data']->invoice_id)->get();
        return response(['status' => 1, 'data' => $data] );
    }
    
    public function createNICTInvoice(Request $request){
        
        $offset = $request->input('offset');
        $limit = $request->input('limit');

        /*if($request->get('start_date') && $request->get('end_date')){
            \Session::put('export_start_date',$request->get('start_date'));
            \Session::put('export_end_date',$request->get('end_date'));
            return \Excel::download(new PartnerInvoiceImport(), 'invoice.xlsx');
        }*/
        
        $data['data'] = PartnerInvoice::select('partner_invoices.*','vle_users.name')
        ->join('vle_users','vle_users.id','=','partner_invoices.vle_id')
        ->latest()->skip($offset)->take($limit)->get();
        return response(['status' => 1, 'data' => $data] );
        
    }
    
    
    public function saveNictInvoiceData(Request $request){
        $data=$request->all();
    }
}

?>