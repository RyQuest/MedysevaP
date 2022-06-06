@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Vle List</h2>
            <a href="{{route('user.vleAdd')}}" class="btn btn-primary pull-right mt-10 mr-5">Add New</a>
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
                                    <th>Chamber</th>
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
                                    <td>
                                        <div class="round round-{{$listColor}}">S</div>
                                        <div class="designer-info">
                                            <h6>{{$value->name}}</h6>
                                        </div>
                                    </td>
                                    <td>{{$value->email}}</td>
                                    <td>
                                        @if($value->chamber_id == 0)
                                        All Chambers
                                        @elseif(isset($value->chamber))
                                        {{$value->chamber->name}}
                                        @endif
                                    </td>
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
    $("#list-table").dataTable({
        lengthChange:false,
        "order": [[ 3, "desc" ]]
    });
</script>
@stop