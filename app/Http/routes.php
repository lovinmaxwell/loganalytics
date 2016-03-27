<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/home', 'Modules\SystemController@index');
    Route::get('/authentication', 'Modules\SystemController@authentication');
    Route::get('/security', 'Modules\SystemController@security');
    Route::get('/nids', 'Modules\SystemController@nids');
    Route::get('/usblogs', 'Modules\SystemController@usblogs');
    Route::get('/changelogs', 'Modules\SystemController@changelogs');
    Route::get('/vpnlogs', 'Modules\SystemController@vpnlogs');


    Route::group(['prefix' => '/modules', 'middleware' => 'auth'], function () {

        Route::get('/users', 'Modules\UsersController@home');

    });

    Route::resource('/users', 'Modules\UsersController');

});
