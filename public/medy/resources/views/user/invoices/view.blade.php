@extends('layouts.partner')
@section('content')

<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Invoice Details</h2>

        </header>
        <div class="content-body details-box-inner">
            <div class="row main-details-row">
                <div class="col-md-4">
                    <div>

                        <div>
                            <table>
                                <tr>
                                    <td><b>Patient Name:</b></td>
                                    <td>{{$data->patient_name}}</td>
                                </tr>
                                <tr>
                                    <td><b>MR No:</b></td>
                                    <td>1234</td>
                                </tr>
                                <tr>
                                    <?php
                                        $year = "";
                                        if($data->dob){
                                            $d1 = new DateTime(date('Y-m-d'));
                                            $d2 = new DateTime(date('Y-m-d',strtotime($data->dob)));
                                                
                                            $diff = $d2->diff($d1);
                                            $year = $diff->y;
                                            $year = ", ". $year . " years"; 
                                        }
                                    ?>
                                    <td><b>Gender/ Age:</b></td>
                                    <td>{{$data->sex == 1 ? "Male":"Female"}}/{{$year}}</td>
                                </tr>
                                <tr>
                                    <td><b>Ref. Doctor:</b></td>
                                    <td>Dr. SELF</td>
                                </tr>
                                <tr>
                                    <td><b>Ref. Company:</b></td>
                                    <td>SELF</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>

                        <div>
                            <table>
                                <tr>
                                    <td><b>Bill No:</b></td>
                                    <td> 1234</td>
                                </tr>
                                <tr>
                                    <td><b>Date/ Time:</b></td>
                                    <td> {{date('Y-m-d',strtotime($data->created_at))}} {{date('H:i A',strtotime($data->created_at))}} </td>
                                </tr>
                                <tr>
                                    <td><b>Mobile No.:</b></td>
                                    <td> {{$data->mobile}}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table vm table-small-font no-mb table-bordered table-striped">
                        <thead>
                            <th>S.No</th>
                            <th>Service Name</th>
                            <th>QTY</th>
                            <th>Amount</th>
                        </thead>
                        <tbody>
                            @foreach($items as $key => $value)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>1</td>
                                    <td>{{$value->price}}</td>
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
                                <tr>
                                    <td><b>Sub Total:</b></td>
                                    <td>{{$data->total}}</td>
                                </tr>
                                <tr>
                                    <td><b>Discount:</b></td>
                                    <td>{{$data->discount_value ? $data->discount_value : 0 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Total:</b></td>
                                    <td>{{$data->total}}</td>
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