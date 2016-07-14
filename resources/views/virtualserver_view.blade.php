@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    @include('common.errors')
    <div class="col-md-6">
        <p>Something</p>
    </div>
    <div class="col-md-6">
        <!-- USERS LIST -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Online Users ( {{ count($virtual_server->getClientList()) }} )</h3>

            </div>
            <!-- /.box-header -->
            <div style="display: block; max-height: 400px; overflow: scroll; overflow-x: hidden;" class="scroll box-body no-padding">
                <ul class="users-list clearfix">
                    @forelse($virtual_server->getClientList() as $client)

                        <li>
                            @if( $client['client_avatar'] != NULL )
                                <img src="data:image/png;base64,{{ $client['client_avatar'] }}" width="128" height="128" style="width: 128px; height: 128px;" alt="{{ $client['client_nickname'] }} avatar">
                            @else
                                <img src="{{ URL::asset('assets/images/unknown.png') }}" width="128" height="128" style="width: 128px; height: 128px;" alt="{{ $client['client_nickname'] }} avatar">
                            @endif
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="client_actions" data-toggle="dropdown">{{ $client['client_nickname'] }}
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="client_actions">
                                        <li role="presentation"><a type="button" data-toggle="modal" data-target="#kick_{{ $client['clid'] }}" user-uid="1" role="menuitem" tabindex="-1" href="#">Kick</a></li>
                                        <li role="presentation"><a type="button" data-toggle="modal" data-target="#ban" user-uid="1" role="menuitem" tabindex="-1" href="#">Ban</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Send Message</a></li>
                                    </ul>
                                </div>
                            <span class="users-list-date"><i class="fa fa-circle" style="color: green;"></i> Online</span>
                        </li>

                        <div class="modal fade" tabindex="-1" role="dialog" id="kick_{{ $client['clid'] }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Kick</h4>
                                    </div>
                                    <form action="{{ URL::Route('client_kick', array($virtual_server->id, $client['clid'])) }}" method="POST">
                                        <div class="modal-body">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}
                                            <div class="form-group">
                                                <input type="text" name="description" class="form-control" value="You have been kicked! From ts3cp.jreis.pt" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Kick">
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->


                    @empty
                        <p>No Users Online</p>
                    @endforelse
                </ul>
                <!-- /.users-list -->
            </div>




            <div class="modal fade" tabindex="-1" role="dialog" id="ban">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ban</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <!-- /.box-body -->
            <!--<div style="display: block;" class="box-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Users</a>
            </div>-->
            <!-- /.box-footer -->
        </div>
        <!--/.box -->
    </div>


@endsection