<!-- LOGS PANEL -->
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">LOGS ( 30 )</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <ul class="list-group">
            @if($virtual_server->success != false)
                @forelse($virtual_server->viewLogs() as $log)
                    <li class="list-group-item">{{ $log['l'] }}</li>
                @empty
                    <li>No Logs</li>
                @endforelse
            @else
                <li class="list-group-item">Start the server first</li>
            @endif
        </ul>
    </div>

</div>