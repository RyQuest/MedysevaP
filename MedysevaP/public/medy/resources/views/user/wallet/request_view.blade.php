@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Withdraw Request Details</h2>

        </header>
        <div class="content-body details-box-inner">
            <div class="row main-details-row">
                <div class="col-md-12">
                    <table class="table vm table-small-font no-mb table-bordered table-striped dataTable no-footer">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>Request Amount</td>
                                <td>{{$data->amount}}</td>
                            </tr>
                            <tr>
                                <td>Current Amount</td>
                                <td>{{walletAmount($data->wallet_id)}}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ucfirst($data->status)}}</td>
                            </tr>
                            <tr>
                                <td>TDS</td>
                                <td>{{$data->tds}}</td>
                            </tr>
                            <tr>
                                <td>Total Withdrawable</td>
                                <td>{{$data->amount - $data->tds}}</td>
                            </tr>
                            <tr>
                                <td>Request Date</td>
                                <td>{{date('Y-m-d H:i:s',strtotime($data->created_at))}}</td>
                            </tr>
                            <tr>
                                <td>Approval Date</td>
                                <td>@if($data->approve_date) {{date('Y-m-d H:i:s',strtotime($data->approve_date))}}  @else -  @endif</td>
                            </tr>
                            @if($data->status == "rejected")
                            <tr>
                                <td>Reject Reason</td>
                                <td>{{$data->reason}}</td>
                            </tr>
                            @endif
                            @if($data->status == "pending")
                            <tr>
                                <td colspan="2">
                                    <button data-value="{{$data->id}}" class='btn btn-primary approveRequest'>Approve</button>
                                    <button class="btn btn-danger rejectModal" data-value="{{$data->id}}">Reject</button>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </section>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject Reason</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{route('user.withdrawRequestReject')}}">
      <div class="modal-body">
        @csrf
        <div class="form-group">
            <input type="hidden" name="id" class="request_id" value="">
            <label>Reason *</label>
            <textarea class="form-control" name="reason" placeholder="Reason"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Reject Request</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Approve Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('user.withdrawRequestApprove')}}" method="post">
          @csrf
          <input type="hidden" name="id" class="approvalId">
      <div class="modal-body">
        <div class="table-data">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-secondary approveBtn">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>




<div class="clearfix"></div>
@stop

@section('script')
<script>
    $("#trx-table").dataTable({lengthChange:false});
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
        var id = $(this).data('value');
        if(id){
            $.ajax({
            "type":"get",
            "url":"/wallet/request-approval-data",
            "data":{id:id},
            "dataType":"json",
            success:function(data){
                $(".approvalId").val(id);
                $(".table-data").html(data.data);
                if(data.approve == false){
                    $(".approveBtn").css('display','none');
                }
                $("#exampleModal3").modal('show');
            }
        });
        }
    });
</script>
@stop