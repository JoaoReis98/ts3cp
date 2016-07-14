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
/**
 * Logged Group
 */
Route::group(['middleware' => ['CheckLogged']], function () {
    /**
     * Index
     */
    Route::get('/',
        [
            'as'        => 'dashboard',
            'uses'      => 'Controller@dashboard_main'
        ]);
    /**
     * Servers
     */
    Route::get('servers',
        [
            'as' => 'servers',
            'uses' => 'Controller@servers_view'
        ]);
    /**
     * Single Server
     */
    Route::get('server/{id}',
        [
            'as'    => 'server',
            'uses'  => 'Controller@dashboard_server'
        ])->where(['id' => '[0-9]+']);
    /**
     * Virtual Server
     */
    /*
    Route::get('virtualserver/{id}',
        [
            'as'    => 'virtualserver_view',
            'uses'  => 'Controller@virtualserver_view'
        ])->middleware(['UserOwnsVirtualServer'])->where(['id' => '[0-9]+']);*/

    Route::group(['prefix' => 'virtualserver/{id}', 'middleware' => 'UserOwnsVirtualServer', 'where' => ['id' => '[0-9]+']], function() {

        Route::get('/',
            [
                'as'    => 'virtualserver_view',
                'uses'  => 'Controller@virtualserver_view'
            ]);

        Route::post('kick/{clid}', ['as' => 'client_kick', 'uses' => 'Controller@client_kick']);

    });
    /**
     * my_virtualservers
     */

    Route::get('my_virtualservers',
        [
            'as'    => 'my_virtualservers',
            'uses'  => 'Controller@my_virtualservers'
        ]);
    /**
     * Admin Group
     */
    Route::group(['prefix' => 'admin', 'middleware' => ['CheckAdmin']], function() {
        /**
         * Index
         */
        Route::get('/', [
            'as'    => 'admin',
            'uses'  => 'Admin@index'
        ]);

        /**
         * Users
         */
        Route::get('users', [
            'as'        => 'admin_users',
            'uses'      => 'Admin@users'
        ]);

        /**
         * Servers
         */
        Route::get('servers', [
            'as'        => 'admin_servers',
            'uses'      => 'Admin@servers'
        ]);

        /**
         * Single User
         */
        Route::get('user/{id}', ['as' => 'admin_user_view', 'uses' => 'Admin@user'])->where(['id' => '[0-9]+']);
    });

});


