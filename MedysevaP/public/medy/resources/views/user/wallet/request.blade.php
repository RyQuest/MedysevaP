@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Withdraw Requests</h2>

        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">

                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="trx-table" class="table vm table-small-font no-mb table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Request Amount</th>
                                    <th>Current Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                 <tr>
                                    
                                    <td>
                                        @if($value->user_role == 'vle')
                                        <?php $user = vleUser($value->user_id);?>
                                        {{$user->name}}
                                        @elseif($value->user_role == 'user')
                                        <?php $user = getuser($value->user_id);?>
                                        {{$user->name}}
                                        @endif
                                        </td>
                                    <td>{{date('Y-m-d',strtotime($value->created_at))}}</td>
                                    <td>{{$value->amount}}</td>
                                    <td>{{walletAmount($value->wallet_id)}}</td>
                                    <td>{{ucfirst($value->status)}}</td>
                                    <td>
                                        @if($value->status == "pending")
                                        <a href="#" data-value="{{$value->id}}" class='btn btn-primary approveRequest'>Approve</a>
                                        <a href='#' class='btn btn-danger rejectModal' data-value="{{$value->id}}">Reject</a>
                                        @elseif($value->status == "rejected")
                                        <a href='#' class='btn btn-danger viewReason' data-value="{{$value->id}}">View Reason</a>
                                        @endif
                                        <a href="{{route('user.withdrawRequestView',$value->id)}}" class='btn btn-primary'>View </a>
                                    </td>
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
      
      <form method="post" action="{{route('user.withdrawRequestReject')}}">
      <div class="modal-body">
          <h2 class="modal-title" id="exampleModalLabel">Reject Reason</h2>
        <button type="button" class="btn-close btn btn-primary gradient-blue" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        @csrf
        <div class="form-group">
            <input type="hidden" name="id" class="request_id" value="">
            <label>Reason *</label>
            <textarea class="form-control" name="reason" rows="5" placeholder="Reason"></textarea>
        </div>
        <button type="button" class="btn btn-primary gradient-blue" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary gradient-blue">Save changes</button>
      </div>
      
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Reject Reason</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="form-group">
            <label>Reason *</label>
            <p class="rejectedReason"></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
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