@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
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
    
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Topup Requests</h2>

        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">

                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="trx-table" class="table vm table-small-font no-mb table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Deposit Slip</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                 <tr>
                                     <td>{{$value->name}}</td>
                                     <td>{{$value->amount}}</td>
                                     <td>{{$value->created_at}}</td>
                                     <td><a href="https://clinic.medyseva.com/{{$value->deposit_slip}}" target="_blank">View</a></td>
                                     <td>{{ucfirst($value->status)}}</td>
                                     <td>
                                        @if($value->status == "pending")
                                        <a href="#" data-value="{{$value->id}}" class='btn btn-primary approveRequest'>Approve</a>
                                        <a href='#' class='btn btn-danger rejectModal' data-value="{{$value->id}}">Reject</a>
                                        @endif
                                        <a href="{{route('user.topupRequestView',$value->id)}}" class='btn btn-primary'>View </a>
                                     </td>
                                     
                                     <form action="{{route('user.approveTopupRequest')}}" id="approveForm" method="post">
                                        @csrf
                                        <input type="hidden" name="request_id" value="{{$value->id}}">
                                    </form>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form method="post" action="{{route('user.topupRequestReject')}}">
      <div class="modal-body">
          <h2 class="modal-title" id="exampleModalLabel">Reject Reason</h2>
        <button type="button" class="btn-close btn btn-primary gradient-blue" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        @csrf
        <div class="form-group">
            <input type="hidden" name="id" class="request_id" value="">
            <label>Reason *</label>
            <textarea class="form-control" name="reason" rows="5" placeholder="Reason"></textarea>
        </div>
        <button type="submit" class="btn btn-primary gradient-blue">Reject</button>
        <button type="button" class="btn btn-primary gradient-blue" data-dismiss="modal">Close</button>
      </div>
      
      </form>
    </div>
  </div>
</div>

<div class="clearfix"></div>

@stop

@section('script')
<script>
    $("#trx-table").dataTable({lengthChange:false, "order": [[ 2, "desc" ]]});
    $("body").on("click",".rejectModal",function(){
        var id = $(this).data('value');
        $(".request_id").val(id);
        $("#exampleModal").modal('show');
    });
    
    $("body").on("click",".viewReason",function(){
        var id = $(this).data('value');
        $.ajax({
            "type":"get",
            "url":"/wallet/request/reason",
            "data":{id:id},
            "dataType":"json",
            success:function(data){
                debugger;
                $(".rejectedReason").html(data.data);
                $("#exampleModal2").modal('show');
            }
        });
    })
    
    $("body").on("click",".approveRequest",function(){
        if(confirm('Do you really want to approve ?')){
            $(this).closest("tr").find('form').submit();
        }
    });
</script>
@stop