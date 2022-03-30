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
            <h2 class="title pull-left">VLE Session </h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">

                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="list-table" class="table vm table-small-font no-mb table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>VLE Name</th>
                                    <th>Ip Address</th>
                                    <th>Total Session</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                 <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->ip_address}}</td>
                                    <td>{{$value->total}}</td>
                                    <td>{{date('d F,Y',strtotime($value->date))}}</td>
                                    <td><a href="{{route('user.viewVleSession',[$value->user_id,date('Y-m-d',strtotime($value->created_at))])}}" class="btn btn-success">View Session</a></td>
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
        "order": [[ 4, "desc" ]]
    });
</script>
@stop