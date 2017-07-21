<?php

/*
|--------------------------------------------------------------------------
| Application Routes API
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'customers'], function() {
	//Route::get('/', ['as' => 'api.customers.all', 'uses' => 'CustomersController@getAll']);
	Route::group(['prefix' => '{customer}'], function() {
		Route::get('/', ['as' => 'api.customers.all', 'uses' => 'CustomersController@getCustomer']);

		Route::get('locations', ['as' => 'api.customer.locations', 'uses' => 'LocationsController@getCustomerLocations']);
		Route::get('locations/{location}', ['as' => 'api.customer.location', 'uses' => 'LocationsController@getCustomerLocation']);

		Route::get('devices', ['as' => 'api.customer.devices', 'uses' => 'DevicesController@getCustomerDevices']);
		Route::get('devices/{device}', ['as' => 'api.customer.devices', 'uses' => 'DevicesController@getCustomerDevice']);
	});
});