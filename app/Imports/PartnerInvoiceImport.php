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
            return PartnerInvoice::select('amount','gst','total','status')->whereBetween('created_at', [$export_start_date, $export_end_date])->get();
        }
        return PartnerInvoice::select('amount','gst','total','status')->get();
    }

    public function headings(): array
    {
        return ['Amount','GST','Total','Status'];
    }
}
