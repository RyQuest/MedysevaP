@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Invoices</h2>

        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">

                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="list-table" class="table vm table-small-font no-mb table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Patient</th>
                                    <th>Invoice No.</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $listColors = array('primary','warning','info','success','danger');
                                ?>
                                @foreach($data as $key => $value)
                                <?php 
                                    $listColor = $listColors[rand(0, count($listColors) - 1)];
                                    $year = "";
                                    if($value->dob){
                                        $d1 = new DateTime(date('Y-m-d'));
                                        $d2 = new DateTime(date('Y-m-d',strtotime($value->dob)));
                                            
                                        $diff = $d2->diff($d1);
                                        $year = $diff->y;
                                        $year = ", ". $year . " years"; 
                                    }
                                ?>
                                 <tr>
                                    <td>
                                        <div class="round round-{{$listColor}}">S</div>
                                        <div class="designer-info">
                                            <h6>{{$value->patient_name}}</h6>
                                            <small class="text-muted">{{$value->sex == 1 ? "Male" : "Female"}} {{$year}}</small>
                                        </div>
                                    </td>
                                    <td>{{$value->invoice_id}}</td>
                                    <td>{{ucfirst($value->paymant_status)}}</td>
                                    <td>{{$value->total - $value->discount_value}}</td>
                                    <td>{{date('Y-m-d',strtotime($value->created_at))}}</td>
                                    <td><a href="{{route('user.invoiceView',$value->id)}}" class="btn btn-sm btn-primary">View</a></td>
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
    $("#list-table").dataTable({lengthChange:false});
</script>
@stop