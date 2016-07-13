<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use DB;

class UserOwnsVirtualServer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( ! count(DB::table('group_users_virtualservers')->where(
            array(
                array('user_id', '=', Auth::User()->id),
                array('virtualserver_id', '=', $request->id)
            ))->get()) )
        {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
