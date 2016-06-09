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



Route::group(['middleware' => ['before' => 'jwt.auth']], function () {
    Route::resource('api/user', 'UsersController');
    Route::resource('api/group', 'GroupsController');
    Route::resource('api/project', 'ProjectsController');
    Route::resource('api/lesson', 'LessonsController');

    Route::get('api/authenticate/user', 'AuthenticationController@getAuthenticatedUser');

});

Route::group(['middleware' => ['guest']], function () {
    Route::post('api/register', 'AuthenticationController@register');
    Route::post('api/login', 'AuthenticationController@login');

    Route::get('/{any}', function ($any) {
        return view('index');
    })->where('any', '.*');
});
