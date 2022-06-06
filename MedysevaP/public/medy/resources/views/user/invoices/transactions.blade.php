@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Vle List</h2>

        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">

                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="list-table" class="table vm table-small-font no-mb table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Transaction Id</th>
                                    <th>Patient</th>
                                    <th>Chamber</th>
                                    <th>Amount</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $listColors = array('primary','warning','info','success','danger');
                                ?>
                                @foreach($data as $key => $value)
                                <?php 
                                    $listColor = $listColors[rand(0, count($listColors) - 1)];
                                ?>
                                 <tr>
                                     <td>{{$value->puid}}</td>
                                    <td>{{$value->patient_name}}</td>
                                    <td>{{$value->chamber_name}}</td>
                                    <td>{{$value->amount}}</td>
                                    <td>{{date('Y-m-d',strtotime($value->created_at))}}</td>
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