@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Topup Request Details</h2>

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
                                <td>Amount</td>
                                <td>{{$data->amount}}</td>
                            </tr>
                            
                            <tr>
                                <td>UTR No.</td>
                                <td>{{$data->utr_no}}</td>
                            </tr>
                            
                            <tr>
                                <td>Date</td>
                                <td>{{date('d F,Y',strtotime($data->created_at))}}</td>
                            </tr>
                            
                            <tr>
                                <td>Approve Date</td>
                                <td>{{$data->approve_date ? date('d F,Y',strtotime($data->approve_date)) : "-"}}</td>
                            </tr>
                            
                            <tr>
                                <td>Status</td>
                                <td>{{ucfirst($data->status)}}</td>
                            </tr>
                            
                            @if($data->status == "rejected")
                            <tr>
                                <td>Reject Reason</td>
                                <td>{{$data->reason}}</td>
                            </tr>
                            @endif
                            <?php 
                                $loginUserWallet = loginUserWallet();
                            ?>
                            @if($data->status == "pending" && $loginUserWallet->id != $data->wallet_id)
                            <tr>
                                <td colspan="2">
                                    <button data-value="{{$data->id}}" class='btn btn-primary' id="approveBtn">Approve</button>
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

<form action="{{route('user.approveTopupRequest')}}" id="approveForm" method="post">
    @csrf
    <input type="hidden" name="request_id" value="{{$data->id}}">
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject Reason</h5>
        <button type="button" class="btn-close btn btn-primary gradient-blue" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div>
      <form method="post" action="{{route('user.topupRequestReject')}}">
      <div class="modal-body">
        @csrf
        <div class="form-group">
            <input type="hidden" name="id" class="request_id" value="">
            <label>Reason *</label>
            <textarea class="form-control" name="reason" placeholder="Reason"></textarea>
        </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary gradient-blue">Reject Request</button>
        <button type="button" class="btn btn-secondary gradient-blue" data-dismiss="modal">Close</button>
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
    
   $("body").on("click","#approveBtn",function(){
       if(confirm('Do you really want to approve ? ')){
            $("#approveForm").submit(); 
       }
   });
   
</script>
@stop