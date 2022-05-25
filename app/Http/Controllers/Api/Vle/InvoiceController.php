<?php

namespace App\Http\Controllers\Api\Vle;

use App\Http\Controllers\Controller;
use App\Models\InvoiceItem;
use App\Models\Invoices;
use App\Models\VleUser;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public function __construct()
    {
        \Config::set('jwt.user', VleUser::class);
        \Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => VleUser::class,
        ]]);
    }

    public function vle_invoice(Request $request){
        $user = \JWTAuth::parseToken()->authenticate($request->token);

        $invoice = Invoices::select('invoices.*','patientses.name as patient_name')
        ->join('patientses','patientses.id','=','invoices.patient_id')
        ->where('vle_id',$user->id)
        ->where('invoice_type','manual_invoice')
        ->groupBy('invoices.invoice_id')
        ->get();

        return response(['status' => 1,'data' => $invoice]);
    }

    public function details($id){
        $data['invoice'] = Invoices::where('id',$id)->first();
        $data['items'] = InvoiceItem::where('invoice_id',$data['invoice']->invoice_id)->get();

        return response(['status' => 1,'data' => $data]);
    }
    
}
