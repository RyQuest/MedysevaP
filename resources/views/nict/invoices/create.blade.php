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
            <h2 class="title pull-left">Registration Invoice </h2>

        </header>
        <div class="content-body details-box-inner">

            <div class="row">
                <div class="col-md-12">
                    <table class="table vm table-small-font no-mb table-bordered table-striped" id="trx-table">
                        <thead>
                            <th>VLE Name</th>
                            <th>Total Amount</th>
                            <th>TDS</th>
                            <th>Received Amount</th>
                            <th>Status</th>
                            <th>Approve Date</th>
                            <th>Date</th>
                        </thead>
                         <tbody>
                             @foreach($data as $key => $value)
                          <tr>
                              <td>
                                  {{$value->name}}
                              </td>
                              
                              <td>
                                  <span>{{$value->total}}</span>
                              </td>
                              <td>
                                  {{$value->status == "pending" ? "0":$value->gst}}
                              </td>
                              <td>
                                  {{$value->status == "pending" ? "0" : $value->amount}}
                              </td>
                              <td>
                                  {{ucfirst($value->status)}}
                              </td>
                              <td>
                                  {{$value->approve_date ? date('d F,Y',strtotime($value->approve_date)) : ""}}
                              </td>
                              <td>
                                  {{date('d F,Y',strtotime($value->created_at))}}
                              </td>
                          </tr>
                          @endforeach
                        </tbody>

                    </table>

                </div>
            </div>

            <div class="row main-details-row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <div>
                        <div>
                            <table class="table vm table-small-font no-mb">
                                
                                

                            </table>
                        </div>
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

 function RequestAmount(){
     
         $.ajax({
            "type":"get",
            "url":"/invoice/request-amount",
            "data":{total:354},
            "dataType":"json",
            success:function(data){
                alert('done')
            }
        });
    
 }
    
</script>

<script>
    $("#trx-table").dataTable({
        lengthChange:false,
        "order": [[ 6, "desc" ]]
    });
</script>

@stop