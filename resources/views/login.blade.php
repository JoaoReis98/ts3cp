@extends('layouts.master_login')

@section('title', 'Login')

@section('content')
    @include('common.errors')
    <form action="{{URL::Route('auth_login')}}" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <div class="form-group has-feedback">
            <input name="email" type="email" class="form-control" placeholder="Email">
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-12 pull-right">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
            <!-- /.col -->
        </div>

    </form>

@endsection