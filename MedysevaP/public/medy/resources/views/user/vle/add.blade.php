@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Vle Add</h2>

        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <form class="" action="{{route('user.vleCreate')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Chamber*</label>
                            <select class="form-control" name="chamber">
                                <option value="">Select Chamber</option>
                                @foreach($chamber as $key => $value)
                                <option value="{{$value->id}}" {{old('chamber') == $value->id ? 'selected':''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name*</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label>Register Fee*</label>
                            <input type="text" name="register_fee" class="form-control" value="{{old('register_fee')}}">
                        </div>
                        <div class="form-group">
                            <label>Confirm Register Fee*</label>
                            <input type="text" name="confirm_register_fee" class="form-control" value="{{old('confirm_register_fee')}}">
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