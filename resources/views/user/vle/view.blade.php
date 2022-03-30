@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">VLE Details</h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">

                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="list-table" class="table vm table-small-font no-mb table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <td>Created On</td>
                                    <td>{{$data->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Aadhar Front</td>
                                    <td>
                                        @if($data->aadhar_front)
                                        <a href="{{asset('storage/'.$data->aadhar_front)}}" target="_blank"><img src="{{asset('storage/'.$data->aadhar_front)}}" width="100" style="width:100px"></a>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aadhar Back</td>
                                    <td>
                                        @if($data->aadhar_back)
                                        <a href="{{asset('storage/'.$data->aadhar_back)}}" target="_blank"><img src="{{asset('storage/'.$data->aadhar_back)}}" width="100" style="width:100px"></a>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pan Card Front</td>
                                    <td>
                                        @if($data->pan_front)
                                        <a href="{{asset('storage/'.$data->pan_front)}}" target="_blank"><img src="{{asset('storage/'.$data->pan_front)}}" width="100" style="width:100px"></a>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pan Card Back</td>
                                    <td>
                                        @if($data->pan_back)
                                        <a href="{{asset('storage/'.$data->pan_back)}}" target="_blank"><img src="{{asset('storage/'.$data->pan_back)}}" width="100" style="width:100px"></a>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>12th Marksheet</td>
                                    <td>
                                        @if($data->marksheet)
                                        <a href="{{asset('storage/'.$data->marksheet)}}" target="_blank"><img src="{{asset('storage/'.$data->marksheet)}}" width="100" style="width:100px"></a>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address Proof</td>
                                    <td>
                                        {{addressProof($data->address_proof)}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address Proof Copy</td>
                                    <td>
                                        @if($data->marksheet)
                                        <a href="{{asset('storage/'.$data->address_proof_copy)}}" target="_blank"><img src="{{asset('storage/'.$data->address_proof_copy)}}" width="100" style="width:100px"></a>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
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

@stop