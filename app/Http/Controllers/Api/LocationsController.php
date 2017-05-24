<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\TrackingLocation;

class LocationsController extends Controller
{
	public function getCustomerLocations(Customer $customer) {
		return $customer->locations;
	}

	public function getCustomerLocation(Customer $customer, $locationId) {
		return $customer->locations()->where('id', $locationId)->first();
	}
}