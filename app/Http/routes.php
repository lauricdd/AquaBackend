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


Route::get('dashboard', function () {
    return view('layout.dashboard');
});

Route::get('home', function () {
    return view('layout.home');
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route:post('login', 'Auth\AuthController@postLogin');
Route::get('/', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::resource('users', 'UsersController');

Route::resource('nodes', 'NodesController');

Route::get('mynodes', 'NodesController@getMyNodes');

Route::resource('sensors', 'SensorsController');

//Route::get('sensorsbynode/{node_id}', ['as' => 'sensorsbynode_show', 'uses' => 'SensorsByNodeController@showSensors']);

Route::resource('sensorsbynode', 'SensorsByNodeController');


