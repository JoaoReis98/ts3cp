@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    @include('common.errors')
    <div class="row">
        {{ $virtual_server->connect() }}
        <pre>{{ print_r($virtual_server) }}</pre>
        <h2></h2>
        <div class="col-md-6">
            @include('layouts.virtualserver_main_panel')
        </div>
        <div class="col-md-6">

            @if($virtual_server->success != false)
                @include('layouts.virtualserver_online_users')
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('layouts.virtualserver_logs')
        </div>
    </div>
@endsection