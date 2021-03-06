@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Patient List</h2>

        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">

                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="list-table" class="table vm table-small-font no-mb table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Gender</th>
                                    <th>Created Date</th>
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
                                ?>
                                 <tr>
                                    <td>
                                        <div class="round round-{{$listColor}}">S</div>
                                        <div class="designer-info">
                                            <h6>{{$value->name}}</h6>
                                        </div>
                                    </td>
                                    <td>{{$value->email ? $value->email : "N/A"}}</td>
                                    <td>{{$value->mobile}}</td>
                                    <td>{{$value->sex == 1 ? "Male" : "Female"}}</td>
                                    <td>{{date('Y-m-d',strtotime($value->created_at))}}</td>
                                    <td><a href="{{route('user.patientView',$value->id)}}" class="btn btn-sm btn-primary">View</a></td>
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