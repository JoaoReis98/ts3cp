@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    @include('common.errors')
    <div class="row">
        @forelse($virtual_servers as $virtual_server)

            <?php $virtual_server->connect() ?>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-{{ ($virtual_server->server->success != false && $virtual_server->success != false) ? 'green' : 'red' }}">
                    <a class="remove-link-color" href="{{ ($virtual_server->server->success != false && $virtual_server->success != false) ? URL::Route('virtualserver_view', $virtual_server->id) : '#' }}"><span class="info-box-icon"><i class="fa fa-expand"></i></span></a>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ $virtual_server->serverInfo['virtualserver_name'] }}</span>
                        <span class="info-box-number">{{ $virtual_server->server->ip }}:{{ $virtual_server->port }}</span>

                        <div class="progress">
                            @if($virtual_server->server->success && $virtual_server->success)
                                <div class="progress-bar" style="width: {{ ( ($virtual_server->getSlots() * 100 ) / $virtual_server->getMaxSlots() ) }}%"></div>
                            @endif
                        </div>
                          <span class="progress-description">
                            <b>{{ ($virtual_server->server->success != false && $virtual_server->success != false) ? 'Online' : 'Offline' }}</b>
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        @empty
            <p>No Virtual Servers</p>
        @endforelse
    </div>

@endsection