@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">VLE Add</h2>

        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <form class="" action="{{route('user.vleCreate')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Chamber*</label>
                            <select class="form-control" name="chamber">
                                <option value="">Select Chamber</option>
                                @foreach($chamber as $key => $value)
                                <option value="{{$value->id}}" {{old('chamber') == $value->id ? 'selected':''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('chamber'))
                                <div class="error text-danger">{{ $errors->first('chamber') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Name*</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            @if($errors->has('name'))
                                <div class="error text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}">
                            @if($errors->has('email'))
                                <div class="error text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Register Fee*</label>
                            <input type="text" name="register_fee" class="form-control" value="2124" disabled>
                            @if($errors->has('register_fee'))
                                <div class="error text-danger">{{ $errors->first('register_fee') }}</div>
                            @endif
                        </div>
                        <div class="form-group "style="display:none">
                            <label>Confirm Register Fee*</label>
                            <input type="text" name="confirm_register_fee" class="form-control" value="{{old('confirm_register_fee')}}">
                            @if($errors->has('confirm_register_fee'))
                                <div class="error text-danger">{{ $errors->first('confirm_register_fee') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Upload KYC</label>
                            <hr/>
                        </div>
                         <div class="form-group col-md-6">
                            <label>Aadhar Front*</label>
                            <input type="file" name="adhar_front" class="form-control" required>
                            @if($errors->has('adhar_front'))
                                <div class="error text-danger">{{ $errors->first('adhar_front') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label>Aadhar Back*</label>
                            <input type="file" name="adhar_back" class="form-control" required>
                            @if($errors->has('adhar_back'))
                                <div class="error text-danger">{{ $errors->first('adhar_back') }}</div>
                            @endif
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label>PAN Card Front*</label>
                            <input type="file" name="pan_front" class="form-control" required>
                            @if($errors->has('pan_front'))
                                <div class="error text-danger">{{ $errors->first('pan_front') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label>PAN Card Back*</label>
                            <input type="file" name="pan_back" class="form-control" required>
                            @if($errors->has('pan_back'))
                                <div class="error text-danger">{{ $errors->first('pan_back') }}</div>
                            @endif
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label>12th marksheet *</label>
                            <input type="file" name="marksheet" class="form-control" required>
                            @if($errors->has('marksheet'))
                                <div class="error text-danger">{{ $errors->first('marksheet') }}</div>
                            @endif
                        </div>
                         
                         <div class="form-group col-md-6">
                            <label>Address Proof *</label>
                            <select name="address_proof" class="form-control">
                                <option value="">Select Option</option>
                                <option value="electricity-bill">Electricity Bill</option>
                                <option value="water-bill">Water Bill</option>
                                <option value="telephone-bill">Telephone Bill</option>
                            </select>
                            @if($errors->has('address_proof'))
                                <div class="error text-danger">{{ $errors->first('address_proof') }}</div>
                            @endif
                        </div>
                         <div class="form-group col-md-6">
                            <label>Address Proof Copy *</label>
                            <input type="file" name="address_proof_copy" class="form-control" required>
                            @if($errors->has('address_proof_copy'))
                                <div class="error text-danger">{{ $errors->first('address_proof_copy') }}</div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Create">
                        </div>
                    </form>
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