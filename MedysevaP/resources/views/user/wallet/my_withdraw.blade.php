@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">My Withdraw Request</h2>
            <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary pull-right mt-10 mr-5">Withdraw Request</a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Withdraw Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="{{route('user.applyWithdraw')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Amount *</label>
                                    <input type="text" class="form-control" name="amount" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">

                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="trx-table" class="table vm table-small-font no-mb table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Amount</th>
                                    <th>Approve Date</th>
                                    <th>Date</th>
                                    <th>Wallet Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                <tr>

                                    <td>#{{$key + 1}}</td>
                                    <td>{{$value->amount}}</td>
                                    <td>@if($value->approve_date) {{date('Y-m-d H:i:s',strtotime($value->approve_date))}} @endif</td>
                                    <td>{{date('Y-m-d H:i:s',strtotime($value->created_at))}}</td>
                                    <td>{{$value->current_amount}}</td>
                                    <td><a href="{{route('user.withdrawRequestView',$value->id)}}" class="btn btn-primary">View</a></td>
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
        lengthChange: false,
        "order": [
            [7, "desc"]
        ]
    });
</script>
@stop