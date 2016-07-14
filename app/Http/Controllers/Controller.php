<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Server;
use App\VirtualServer;
use Illuminate\Support\Facades\URL;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;


    public function login(Request $request)
    {
        if(Auth::attempt(array('email' => $request->email, 'password' => $request->password)))
        {
            return redirect()->route('dashboard');
        }
        return redirect()->route('auth_login')->withErrors('Email and/or Password are wrong!');
    }

    public function dashboard_main(Request $request)
    {
        $servers = new Server();
        $servers = $servers->all();
        $breads = array(
            array('url' => "#", 'is_active' => true, 'icon' => 'dashboard', 'title' => 'Dashboard')
        );
        return view('dashboard')->withLogged(Auth::User())->withServers($servers)->withBreads($breads);
    }

    public function dashboard_server(Request $request)
    {
        $breads = array(
            array('url' => Url::Route('dashboard'), 'is_active' => false, 'icon' => 'dashboard', 'title' => 'Dashboard'),
            array('url' => "#", 'is_active' => true, 'icon' => 'server', 'title' => 'Server'),
        );
        
        $servers = new Server();
        $server = $servers->find(array('id' => $request->id))->first();
        $virtual_servers = VirtualServer::where('server_id', $server->id)->get();

        return view('server')->withLogged(Auth::User())->withServer($server)->withVirtualServers($virtual_servers)->withBreads($breads);
    }

    public function virtualserver_view(Request $request)
    {
        $virtual_servers = new VirtualServer();
        $virtual_server = $virtual_servers->find(array('id' => $request->id));
        $virtual_server = $virtual_server->first();

        $breads = array(
            array('url' => Url::Route('dashboard'), 'is_active' => false, 'icon' => 'dashboard', 'title' => 'Dashboard'),
            array('url' => Url::Route('servers'), 'is_active' => true, 'icon' => 'server', 'title' => 'Servers'),
            array('url' => Url::Route('server', $virtual_server->server_id), 'is_active' => false, 'icon' => 'server', 'title' => 'Server'),
            array('url' => "#", 'is_active' => true, 'icon' => 'server', 'title' => 'Virtual Server'),
        );

        return view('virtualserver_view')->withLogged(Auth::User())->withVirtualServer($virtual_server)->withBreads($breads);
    }

    public function servers_view(Request $request)
    {

        $breads = array(
            array('url' => Url::Route('dashboard'), 'is_active' => false, 'icon' => 'dashboard', 'title' => 'Dashboard'),
            array('url' => "#", 'is_active' => true, 'icon' => 'server', 'title' => 'Servers'),
        );

        $servers = new Server();
        $servers = $servers->all();
        return view('servers_view')->withLogged(Auth::User())->withServers($servers)->withBreads($breads);
    }

    public function my_virtualservers(Request $request)
    {
        $breads = array(
            array('url' => Url::Route('dashboard'), 'is_active' => false, 'icon' => 'dashboard', 'title' => 'Dashboard'),
            array('url' => "#", 'is_active' => false, 'icon' => 'star', 'title' => 'My Zone'),
            array('url' => "#", 'is_active' => true, 'icon' => 'server', 'title' => 'Virtual Servers'),
        );
        $groups = DB::table('group_users_virtualservers')->where(array('user_id' => Auth::User()->id))->get();

        $virtual_servers = array();
        foreach($groups as $group)
        {
            $virtual_servers[] = VirtualServer::where('id', $group->virtualserver_id)->get()->first();
        }

        return view('server')->withLogged(Auth::User())->withVirtualServers($virtual_servers)->withBreads($breads);
    }

    public function client_kick(Request $request)
    {
        $virtualserver = VirtualServer::where(array('id' => $request->id))->get()->first();
        $virtualserver->connect();
        $virtualserver->instance->clientKick($request->clid, 'server', $request->description);
        return redirect()->back();
        #return view('server')->withLogged(Auth::User())->withVirtualServers($virtual_servers)->withBreads($breads);
    }

}
