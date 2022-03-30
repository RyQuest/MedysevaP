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
                                <td>Paid Amount</td>
                                <td>
                                    {{ $data->amount }}
                                </td>
                            </tr>
                                <td>Vle Referral</td>
                                <td>
                                    0
                                </td>
                            </tr>
                                <td>Partner Referral</td>
                                <td>
                                    0
                                </td>
                            </tr>
                                <td>Medyseva Referral</td>
                                <td>
                                    {{ $data->amount }}
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
                                <td>Paid Amount</td>
                                <td>
                                    
                                    @foreach($trxData as $key => $value)
                                        @if($value->category == "appointment" && $data->appointment_id > 0)
                                            {{ $value->amount }}
                                        @elseif($value->category == "invoice" && $data->invoice_id > 0)
                                            {{ $value->amount }}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Vle Referral</td>
                                <td>
                                    @foreach($trxData as $key => $value)
                                        @if($value->user_role == "vle" && ($value->category == "invoice_referral" || $value->category == "appointment_referral"))
                                            {{ $value->amount }}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Partner Referral</td>
                                <td>
                                    @foreach($trxData as $key => $value)
                                        @if($value->user_role == "partner")
                                            {{ $value->amount }}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Medyseva Referral</td>
                                <td>
                                    @foreach($trxData as $key => $value)
                                        @if($value->user_role == "admin")
                                            {{ $value->amount }}
                                        @endif
                                    @endforeach
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