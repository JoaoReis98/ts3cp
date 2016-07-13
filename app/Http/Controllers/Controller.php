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
        /*
        $ts3_VirtualServer = new \App\VirtualServer();
        $ts3_VirtualServer = $ts3_VirtualServer->find(array('id' => 1))->first();
        $ts3_VirtualServer->connect();
        */
        $servers = new Server();
        $servers = $servers->all();
        return view('dashboard')->withLogged(Auth::User())->withServers($servers);
    }

    public function dashboard_server(Request $request)
    {
        $servers = new Server();
        $server = $servers->find(array('id' => $request->id))->first();
        $virtual_servers = new VirtualServer();
        $virtual_servers = $virtual_servers->find(array('server_id' => $server->id));
        $virtual_servers = $virtual_servers->all();
        return view('server')->withLogged(Auth::User())->withServer($server)->withVirtualServers($virtual_servers);
    }

    public function virtualserver_view(Request $request)
    {
        $virtual_servers = new VirtualServer();
        $virtual_server = $virtual_servers->find(array('id' => $request->id));
        $virtual_server = $virtual_server->first();
        return view('virtualserver_view')->withLogged(Auth::User())->withVirtualServer($virtual_server);
    }

    public function servers_view(Request $request)
    {
        $servers = new Server();
        $servers = $servers->all();
        return view('servers_view')->withLogged(Auth::User())->withServers($servers);
    }

}
