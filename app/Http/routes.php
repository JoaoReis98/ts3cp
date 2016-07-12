<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/auth/login', ['as' => 'auth_login', function () {
    if(Auth::check()) return redirect()->route('dashboard');
    return view('login');
}]);
Route::get('/auth/logout', ['as' => 'auth_logout', function () {
    Auth::logout();
    return redirect()->route('auth_login');
}]);

Route::post('/auth/login', ['as' => 'auth_login', 'uses' => 'Controller@login']);

Route::get('/', ['as' => 'dashboard', function () {
    if( ! Auth::check()) return redirect()->route('auth_login');

    return view('welcome')->with(array('username' => 'ze Augusto'));
}]);
