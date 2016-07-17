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

class Admin extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function users(Request $request)
    {
        return "Admin Users";
    }

    public function index(Request $request)
    {
        return "Admin index";
    }

    public function user(Request $request)
    {
        return "View user {$request->id}";
    }
    public function servers(Request $request)
    {
        return "SEvers";
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


}
