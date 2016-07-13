@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    @include('common.errors')
    <div class="row">
        @forelse($servers as $server)
            {{ $server->connect() }}
            <?php $info = $server->instance->hostInfo()['data']?>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-{{ ($server->success != false) ? 'green' : 'red' }}">
                    <a class="remove-link-color" href="{{ ($server->success != false) ? URL::Route('server', $server->id) : '#' }}"><span class="info-box-icon"><i class="fa fa-{{ ($server->success != false) ? strtolower($server->version['platform']) : 'server' }}"></i></span></a>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ $server->hostname }}</span>
                        <span class="info-box-number">{{ $server->ip }}</span>
                      <span class="progress-description">

                        <b>{{ ($server->success != false) ? 'Online - '.$server->version['version'] : 'Offline' }}</b>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        @empty
            <p>Without Servers</p>
        @endforelse
    </div>

@endsection