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
}
