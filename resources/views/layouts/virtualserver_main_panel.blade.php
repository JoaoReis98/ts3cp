<!-- MAIN PANEL -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Control Panel</h3>

    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <div class="row">
            @if($virtual_server->success != false)
                <div class="col-md-6">
                    <button class="btn btn-danger btn-flat btn-block">Stop</button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-warning btn-flat btn-block">Restart</button>
                </div>
            @else
                <div class="col-md-12">
                    <button class="btn btn-success btn-flat btn-block">Start</button>
                </div>
            @endif

        </div>
    </div>

</div>