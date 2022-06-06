@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
    <section class="box inner-list-box">
        <header class="panel_header inner-page-header">
            <h2 class="title pull-left">Change Password</h2>

        </header>
        <div class="content-body details-box-inner">
            <div class="row main-details-row">
                <div class="col-md-12">
                    <form action="{{route('user.passwordUpdate')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Old Password *</label>
                            <input type="password" class="form-control" name="old_password">
                            @if($errors->has('old_password'))
                                <div class="error">{{ $errors->first('old_password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>New Password *</label>
                            <input type="password" class="form-control" name="password">
                            @if($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Confirm Password *</label>
                            <input type="password" class="form-control" name="password_confirmation">
                            @if($errors->has('password_confirmation'))
                                <div class="error">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                 </div>
            </div>


        </div>
    </section>
</div>


<div class="clearfix"></div>
@stop