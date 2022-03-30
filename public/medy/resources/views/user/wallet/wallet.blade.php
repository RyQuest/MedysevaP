@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Wallet</h2>

        </header>
        <div class="content-body details-box-inner">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <div class="wallet-box">
                            <h3>Balance : Rs. <b>{{$wallet->amount}}</b></h3>
                            
                        </div>
                        <div>
                            <a href="{{route('user.walletTransactions')}}" class="btn btn-primary">View History</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                <div class="table-responsive" data-pattern="priority-columns">
                        <table id="trx-table" class="table vm table-small-font no-mb table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Transaction Id</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <td>Remark</td>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                 <tr>
                                    
                                    <td>#{{$value->id}}</td>
                                    <td>Medyseva</td>
                                    <td>{{auth()->user()->name}}</td>
                                    <td>
                                        @if($value->category == "appointment")
                                        Appointment Book
                                        @elseif($value->category == "appointment_referral")
                                        Appointment Referral
                                        @elseif($value->category == "deposit")
                                        Deposit
                                        @elseif($value->category == "invoice")
                                        Invoice Appvoe
                                        @elseif($value->category == "invoice_referral")
                                        Invoice Referral
                                        @elseif($value->category == "tds")
                                        TDS
                                        @elseif($value->category == "withdraw")
                                        Withdraw
                                        @elseif($value->category == "register_fee")
                                        Registration Fee
                                        @elseif($value->category == "register_fee_out")
                                        Registration Fee Out
                                        @endif
                                    </td>
                                    <td>{{$value->amount}}</td>
                                    <td>{{date('Y-m-d',strtotime($value->created_at))}}</td>
                                    <td><a href="{{route('user.viewTrx',$value->id)}}" class="btn btn-primary">View</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
            </div>


        </div>
    </section>
</div>


<div class="clearfix"></div>
@stop