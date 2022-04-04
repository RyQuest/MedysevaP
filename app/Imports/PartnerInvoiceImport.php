<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\PartnerInvoice;

class PartnerInvoiceImport implements FromCollection,WithHeadings
{
    /**
    * @param Collection $collection
    */
    public function collection()
    {
        $export_start_date = \Session::get('export_start_date');
        $export_end_date = \Session::get('export_end_date');
        if($export_start_date && $export_end_date){
            $data = PartnerInvoice::select('partner_invoices.*','vle_users.name')
                ->join('vle_users','vle_users.id','=','partner_invoices.vle_id')
                ->whereBetween('partner_invoices.created_at', [$export_start_date, $export_end_date])->get();
                
            $result = array();
            foreach($data as $key => $value){
                $d['name'] = $value->name;
                $d['amount'] = $value->amount;
                $d['gst'] = $value->gst;
                $d['total'] = $value->total;
                $d['approve_date'] = $value->approve_date ? date('Y-m-d H:i:s',strtotime($value->approve_date)) : "";
                $d['date'] = date('Y-m-d H:i:s',strtotime($value->created_at));
                $d['status'] = $value->status;
                $result[] = $d;
            }
            return collect($result);
        }
       
    }

    public function headings(): array
    {
        return ['VLE Name','Amount','GST','Total','Approve Date','Date','Status'];
    }
}
