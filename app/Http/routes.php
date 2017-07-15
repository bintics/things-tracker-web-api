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


Route::group(['prefix'=>'api', 'middleware' => 'auth:api'], function() {
	Route::group(['prefix' => 'customers'], function() {
		Route::get('/', ['as' => 'api.customers.all', 'uses' => 'Api\CustomersController@getAll']);
		Route::group(['prefix' => '{customer}'], function() {
			Route::get('/', ['as' => 'api.customers.all', 'uses' => 'Api\CustomersController@getCustomer']);

			Route::get('locations', ['as' => 'api.customer.locations', 'uses' => 'Api\LocationsController@getCustomerLocations']);
			Route::get('locations/{location}', ['as' => 'api.customer.location', 'uses' => 'Api\LocationsController@getCustomerLocation']);

			Route::get('devices', ['as' => 'api.customer.devices', 'uses' => 'Api\DevicesController@getCustomerDevices']);
			Route::get('devices/{device}', ['as' => 'api.customer.devices', 'uses' => 'Api\DevicesController@getCustomerDevice']);
		});
	});
});

Route::post('api/token', ['uses' => 'Api\SessionController@postLogin']);
Route::post('api/registry', ['uses' => 'RegisterController@postExternalRegistry']);

Route::get('registration', ['as' => 'register', 'uses' => 'RegisterController@getRegister']);
Route::post('registration', ['uses' => 'RegisterController@postRegister']);


Route::get('/', function () {
	return 'Thinks Tracker API v';
});