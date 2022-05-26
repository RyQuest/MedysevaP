<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\VleUser;
class VleImport implements FromCollection,WithHeadings
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
            return VleUser::select('vle_users.name','vle_users.email','chamber.name as chamber_name',\DB::raw('DATE_FORMAT(vle_users.created_at, "%Y-%m-%d %H:%i:%s") as someDate'))->join('chamber','chamber.id','=','vle_users.chamber_id')->whereBetween('vle_users.created_at', [$export_start_date, $export_end_date])->get();
        }
        return VleUser::select('vle_users.name','vle_users.email','chamber.name as chamber_name',\DB::raw('DATE_FORMAT(vle_users.created_at, "%Y-%m-%d %H:%i:%s") as someDate'))->join('chamber','chamber.id','=','vle_users.chamber_id')->get();
    }
    public function headings(): array
    {
        return ["Name",'Email','Chamber','Date'];
    }
}
