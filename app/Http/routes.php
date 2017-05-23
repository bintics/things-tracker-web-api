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


Route::group(['prefix'=>'/', 'middleware' => 'auth'], function() {
	Route::get('/', function() {
		return 'Hola!';
	});
});


Route::get('login', ['as' => 'admin.login', 'uses' => 'Admin\SessionController@getLogin']);
Route::post('login', ['uses' => 'Admin\SessionController@postLogin']);

Route::get('registration', ['as' => 'register', 'uses' => 'RegisterController@getRegister']);
Route::post('registration', ['uses' => 'RegisterController@postRegister']);	