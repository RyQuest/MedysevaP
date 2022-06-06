@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Transaction Details</h2>

        </header>
        <div class="content-body details-box-inner">
            <div class="row main-details-row">
                <div class="col-md-12">
                    <table class="table vm table-small-font no-mb table-bordered table-striped dataTable no-footer">
                        @if($data->category == "register_fee" || $data->category == "register_fee_out")
                            <tr>
                                <td>Transaction Type</td>
                                <td>
                                    Registration Amount
                                </td>
                            </tr>
                            <tr>
                                <td>Total Amount</td>
                                <td>
                                    {{ $data->amount }}
                                </td>
                            </tr>
                            <tr>
                                <td>From</td>
                                <td>{{getUsername($data->from_wallet)}}</td>
                            </tr>
                            <tr>
                                <td>To</td>
                                <td>{{getUsername($data->to_wallet)}}</td>
                            </tr>
                            <tr>
                                <td>Medyseva Amount</td>
                                <td>
                                    {{ $data->amount }}
                                </td>
                            </tr>
                            
                        @elseif($data->category == "register_invoice" )
                            <tr>
                                <td>Transaction Type</td>
                                <td>
                                    Registration Amount
                                </td>
                            </tr>
                            <tr>
                                <td>Total Amount</td>
                                <td>
                                    {{ $data->amount }}
                                </td>
                            </tr>
                            <tr>
                                <td>From</td>
                                <td>{{getUsername($data->from_wallet)}}</td>
                            </tr>
                            <tr>
                                <td>To</td>
                                <td>{{getUsername($data->to_wallet)}}</td>
                            </tr>
                            <tr>
                                <td>VLE Name</td>
                                <td>
                                    <?php 
                                        $vleUser = vleUser($data->vle_id);
                                        if($vleUser){
                                            echo $vleUser->name;
                                        }
                                    ?>
                                </td>
                            </tr>
                                <td>TDS</td>
                                <td>
                                    <?php 
                                        $trxInfo = trxInfo($data->vle_id,$data->trx_id,'tds');
                                        if($trxInfo){
                                            echo $trxInfo->amount;    
                                        }
                                    ?>
                                </td>
                            </tr>
                                <td>Partner Amount</td>
                                <td>
                                    @if($trxInfo)
                                    {{$data->amount - $trxInfo->amount}}
                                    @else
                                    {{$data->amount}}
                                    @endif
                                </td>
                            </tr>
                                <td>Medyseva Amount</td>
                                <td>
                                   @if($trxInfo)
                                        {{$trxInfo->amount}}
                                    @endif
                                </td>
                            </tr>
                            @elseif($data->category == "tds" && $data->appointment_id || $data->invoice_id)
                            <tr>
                                <td>Transaction Type</td>
                                <td>
                                    Referral TDS
                                </td>
                            </tr>
                            <tr>
                                <td>From</td>
                                <td>{{getUsername($data->from_wallet)}}</td>
                            </tr>
                            <tr>
                                <td>To</td>
                                <td>{{getUsername($data->to_wallet)}}</td>
                            </tr>
                            
                            <tr>
                                <td>Total Amount</td>
                                <td>
                                    <?php
                                    $type = "invoice";
                                    if($data->appointment_id){
                                        $type = "appointment";
                                    }
                                        $trxInfo = trxInfo($data->vle_id,$data->trx_id,$type);
                                        if($trxInfo){
                                            echo $trxInfo->amount;    
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>TDS</td>
                                <td>
                                    {{ $data->amount }}
                                </td>
                            </tr>
                            <tr>
                                <td>Patient Name</td>
                                <td>
                                    <?php 
                                        $patient = patientData($data->patient_id);
                                        if($patient){
                                            echo $patient->name;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Medyseva Referral</td>
                                <td>
                                    {{$data->amount}}
                                </td>
                            </tr>
                            @elseif($data->category == "tds")
                            <tr>
                                <td>Transaction Type</td>
                                <td>
                                    Registration TDS
                                </td>
                            </tr>
                            <tr>
                                <td>From</td>
                                <td>{{getUsername($data->from_wallet)}}</td>
                            </tr>
                            <tr>
                                <td>To</td>
                                <td>{{getUsername($data->to_wallet)}}</td>
                            </tr>
                            
                            <tr>
                                <td>Total Amount</td>
                                <td>
                                    <?php 
                                        $trxInfo = trxInfo($data->vle_id,$data->trx_id,'register_invoice');
                                        if($trxInfo){
                                            echo $trxInfo->amount;    
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>TDS</td>
                                <td>
                                    {{ $data->amount }}
                                </td>
                            </tr>
                            <tr>
                                <td>VLE Name</td>
                                <td>
                                    <?php 
                                        $vleUser = vleUser($data->vle_id);
                                        if($vleUser){
                                            echo $vleUser->name;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Medyseva Referral</td>
                                <td>
                                    {{$data->amount}}
                                </td>
                            </tr>
                            @elseif($data->category == "gst" )
                            <tr>
                                <td>Transaction Type</td>
                                <td>
                                    Registration GST
                                </td>
                            </tr>
                            <tr>
                                <td>Total Amount</td>
                                <td>
                                    {{ $data->amount }}
                                </td>
                            </tr>
                            <tr>
                                <td>From</td>
                                <td>{{getUsername($data->from_wallet)}}</td>
                            </tr>
                            <tr>
                                <td>To</td>
                                <td>{{getUsername($data->to_wallet)}}</td>
                            </tr>
                            </tr>
                                <td>Medyseva Amount</td>
                                <td>
                                    {{$data->amount}}
                                </td>
                            </tr>
                        @else
                        <tbody>
                            <tr>
                                <td>Transaction Type</td>
                                <td>
                                    @if($data->appointment_id > 0)
                                    Appointment Create
                                    @elseif($data->invoice_id > 0)
                                    Invoice Approve
                                    @else 
                                    Registration Amount
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Total Amount</td>
                                <td>
                                    <?php $totalPaid = 0;?>
                                    @foreach($trxData as $key => $value)
                                        @if($value->category == "appointment" && $data->appointment_id > 0)
                                            {{ $value->amount }}
                                            <?php $totalPaid = $value->amount;?>
                                        @elseif($value->category == "invoice" && $data->invoice_id > 0)
                                            {{ $value->amount }}
                                            <?php $totalPaid = $value->amount;?>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>From</td>
                                <td>{{getUsername($data->from_wallet)}}</td>
                            </tr>
                            <tr>
                                <td>To</td>
                                <td>{{getUsername($data->to_wallet)}}</td>
                            </tr>
                            <tr>
                                <td>Patient Name</td>
                                <td>
                                    <?php 
                                        $patient = patientData($data->patient_id);
                                        if($patient){
                                            echo $patient->name;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Vle Referral</td>
                                <td>
                                    <?php $vleAmt = 0;?>
                                    @foreach($trxData as $key => $value)
                                        @if($value->user_role == "vle" && ($value->category == "invoice_referral" || $value->category == "appointment_referral"))
                                            {{ $value->amount }}
                                            <?php $vleAmt = $value->amount;?>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Partner Referral</td>
                                <td>
                                    <?php $partnerAmt = 0;?>
                                    @foreach($trxData as $key => $value)
                                        @if($value->user_role == "partner")
                                            {{ $value->amount }}
                                            <?php $partnerAmt = $value->amount;?>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Medyseva Referral</td>
                                <td>
                                    {{($totalPaid - $partnerAmt) - $vleAmt}}
                                </td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>


        </div>
    </section>
</div>


<div class="clearfix"></div>
@stop