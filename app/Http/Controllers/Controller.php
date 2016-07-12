<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}
