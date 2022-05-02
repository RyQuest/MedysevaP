<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\TrHistory;
use App\Models\UserWallet;

class TransactionImport implements FromCollection, WithHeadings
{
    /**
     * @param Collection $collection
     */
    public function collection()
    {
        //
        $export_start_date = \Session::get('export_start_date');
        $export_end_date = \Session::get('export_end_date');
        $export_vle_user_id = \Session::get('export_vle_user_id');

        if ($export_start_date && $export_end_date) {
            
            if($export_vle_user_id){
                $res =  TrHistory::select('*')->whereBetween('created_at', [$export_start_date, $export_end_date])->where('vle_id', $export_vle_user_id)->get();
            }else{
                $res =  TrHistory::select('*')->whereBetween('created_at', [$export_start_date, $export_end_date])->get();
            }
            $result = array();
            foreach ($res as $key => $value) {
                $result1['from'] = "Medyseva";
                $result1['to'] = auth()->user()->name;
                $remark = "";
                if ($value->category == "appointment") {
                    $remark = "Appointment Book";
                } elseif ($value->category == "appointment_referral") {
                    $remark = "Consultation referral";
                } elseif ($value->category == "deposit") {
                    $remark = "Deposit";
                } elseif ($value->category == "invoice") {
                    $remark = "Invoice Appvoe";
                } elseif ($value->category == "invoice_referral") {
                    $remark = "Other services referral";
                } elseif ($value->category == "tds") {
                    $remark = "TDS";
                } elseif ($value->category == "withdraw") {
                    $remark = "Withdraw";
                } elseif ($value->category == "register_fee") {
                    $remark = "Registration Fee";
                } elseif ($value->category == "register_fee_out") {
                    $remark = "Registration Fee Out";
                } elseif ($value->category == "register_invoice") {
                    $remark = "Registration Amount";
                }
                $result1['remark'] = $remark;
                $loginUserWallet = loginUserWallet();
                if($loginUserWallet->id == $value->from_wallet){
                    $result1['type'] = "Debit";
                } else{
                    $result1['type'] = "Credit";
                }
                $result1['amount'] = $value->amount;
                // $result1['wallet_amount'] = $value->current_amount;
                $result1['wallet_amount'] = $loginUserWallet->id == $value->from_wallet ? $value->current_amount : $value->receiver_amount
                $result1['date'] = date('Y-m-d H:i:s',strtotime($value->created_at));

                $result[] = $result1;
            }
        }
        return collect($result);
    }
    public function headings(): array
    {
        return ["From", 'To', 'Remark', 'Type', 'Amount', 'Wallet Amount', 'Created At'];
    }
}
