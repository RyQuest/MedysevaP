<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\TopupRequest;

class TopUpRequestImport implements FromCollection,WithHeadings
{
    /**
    * @param Collection $collection
    */
    public function collection()
    {
        //
        $export_start_date = \Session::get('export_start_date');
        $export_end_date = \Session::get('export_end_date');
        if($export_start_date && $export_end_date){
            return TopupRequest::select('vle_users.name','amount','status','approve_date',\DB::raw('DATE_FORMAT(topup_request.created_at, "%Y-%m-%d %H:%i:%s") as someDate'))->join('vle_users','vle_users.id','=','topup_request.user_id')->whereBetween('topup_request.created_at', [$export_start_date, $export_end_date])->get();
        }
        return TopupRequest::select('vle_users.name','amount','status','approve_date',\DB::raw('DATE_FORMAT(topup_request.created_at, "%Y-%m-%d %H:%i:%s") as someDate'))->join('vle_users','vle_users.id','=','topup_request.user_id')->get();
    }
    public function headings(): array
    {
        return ["Name",'Amount','Status','Approve Date','Created At'];
    }
}
