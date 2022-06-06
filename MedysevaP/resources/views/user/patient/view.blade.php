@extends('layouts.partner')
@section('content')

<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Patient Details</h2>

        </header>
        <div class="content-body details-box-inner">
            <div class="row">
                <div class="col-md-12">
                    <div>

                        <div>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td><b>Patient Name</b></td>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>{{$data->email ? $data->email : "N/A"}}</td>
                                </tr>
                                <tr>
                                    <td><b>Mobile</b></td>
                                    <td>{{$data->mobile ? $data->mobile : "N/A"}}</td>
                                </tr>
                                <tr>
                                    <td><b>Patient Name</b></td>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <td><b>Gender/ Age</b></td>
                                    <td>{{$data->sex == 1 ? "Male":"Female"}}</td>
                                </tr>
                                <tr>
                                    <td><b>DOB</b></td>
                                    <td>{{$data->dob}}</td>
                                </tr>
                                 <tr>
                                    <td><b>Occuptation</b></td>
                                    <td>{{$data->occuptation ? $data->occuptation : "N/A"}}</td>
                                </tr>
                                <tr>
                                    <td><b>Present Address</b></td>
                                    <td>{{$data->present_address ? $data->present_address : "N/A"}}</td>
                                </tr>
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

@stop