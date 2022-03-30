<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\WithdrawRequest;
class WithdrawRequestImport implements FromCollection,WithHeadings
{
    /**
    * @param Collection $collection
    */
    public function collection()
    {
        $export_start_date = \Session::get('export_start_date');
        $export_end_date = \Session::get('export_end_date');
        if($export_start_date && $export_end_date){
            return WithdrawRequest::select('vle_users.name','amount','status','approve_date','bank_narration','utr_no','date_of_payment','withdraw_request.created_at')->join('vle_users','vle_users.id','=','withdraw_request.user_id')->whereBetween('withdraw_request.created_at', [$export_start_date, $export_end_date])->get();
        }
        return WithdrawRequest::select('vle_users.name','amount','status','approve_date','bank_narration','utr_no','date_of_payment')->join('vle_users','vle_users.id','=','withdraw_request.user_id')->get();
    }

    public function headings(): array
    {
        return ["Name",'Amount','Status','Approve Date','Bank Narration','Utr No','Date Of Payment','Date'];
    }
}
