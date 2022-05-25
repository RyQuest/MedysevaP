<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\VleLoginCount;

class VleSessionExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $export_start_date = \Session::get('export_start_date');
        $export_end_date = \Session::get('export_end_date');
        if($export_start_date && $export_end_date){
            $data = VleLoginCount::select('session_count.*','vle_users.name')->join('vle_users','vle_users.id','=','session_count.user_id')->whereBetween('session_count.created_at', [$export_start_date, $export_end_date])->get();
            $array = array();
            foreach($data as $key => $value){
                $data1['name'] = $value->name;
                $data1['ip_address'] = $value->ip_address;
                $data1['date'] = date('Y-m-d H:i:s',strtotime($value->created_at));
                $array[] = $data1;
            }
            return collect($array);
        }
    }

    public function headings(): array
    {
        return ["VLE Name",'Ip Address','Date'];
    }
}
