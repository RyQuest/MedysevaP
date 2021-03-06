@extends('layouts.partner')
@section('content')
<div class="col-lg-12">

    <!-- Export -->
    <section class="box inner-list-box">
        <div class="content-body">
            <form>
                <div class="row">
                    <div class="col-md-4">
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="end_date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Export To Excel</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Filter -->
    <section class="box inner-list-box">
        <div class="content-body">
            <form method="get" action="transactions">
                <div class="row">
                    <div class="col-md-4">
                        <label>VLE*</label>
                        <select class="form-control" name="vle_user" id="">
                            <option value="">--select--</option>
                            @if(!empty( $vle_users ))
                                @foreach( $vle_users as $vle_user )
                                    <option value="{{ $vle_user->id }}">{{ $vle_user->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Transaction History</h2>

        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">

                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="trx-table" class="table vm table-small-font no-mb table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Transaction Id</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <td>Remark</td>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Wallet Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                 <tr>
                                    
                                    <td>{{$value->id}}</td>
                                    <td>{{getUsername($value->from_wallet)}}</td>
                                    <td>{{getUsername($value->to_wallet)}}</td>
                                    <td>
                                        @if($value->category == "appointment")
                                        Appointment Book
                                        @elseif($value->category == "appointment_referral")
                                        Consultation referral
                                        @elseif($value->category == "deposit")
                                        Deposit
                                        @elseif($value->category == "invoice")
                                        Invoice Appvoe
                                        @elseif($value->category == "invoice_referral")
                                        Other services referral
                                        @elseif($value->category == "tds")
                                        TDS
                                        @elseif($value->category == "withdraw")
                                        Withdraw
                                        @elseif($value->category == "topup_recharge")
                                        Topup Recharge
                                        @elseif($value->category == "register_fee")
                                        Registration Fee
                                        @elseif($value->category == "register_fee_out")
                                        Registration Fee Out
                                        @elseif($value->category == "register_invoice")
                                        Registration Amount
                                        @endif
                                        
                                        <?php $username = "";?>
                                        @if($value->vle_id)
                                        <?php 
                                            $vleUser = vleUser($value->vle_id);
                                            if($vleUser){
                                                $username = "<br/><small class='text-black'><b>VLE:" . $vleUser->name."</b></small>";
                                            }
                                        ?>
                                        @elseif($value->patient_id)
                                        <?php 
                                            $vleUser = patientInfo($value->patient_id);
                                            if($vleUser){
                                                $username = "<br/><small class='text-black'><b>Patient:" . $vleUser->name . "</b></small>";
                                            }
                                        ?>
                                        @endif
                                        {!! $username !!}
                                    </td>
                                    <td>
                                        <?php 
                                        $loginUserWallet = loginUserWallet();
                                        if($loginUserWallet->id == $value->from_wallet){
                                            echo "Debit";
                                        } else{
                                            echo "Credit";
                                        }
                                        ?>
                                    </td>
                                    <td>{{$value->amount}}</td>
                                    <td>{{ $loginUserWallet->id == $value->from_wallet ? $value->current_amount : $value->receiver_amount}}</td>
                                    <td>{{date('Y-m-d H:i:s',strtotime($value->created_at))}}</td>
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

@section('script')
<script>
    $("#trx-table").dataTable({
        lengthChange:true,
        "order": [[ 0, "desc" ]]
    });
</script>
@stop