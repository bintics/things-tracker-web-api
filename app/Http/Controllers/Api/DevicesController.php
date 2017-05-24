<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Device;

class DevicesController extends Controller
{
	public function getCustomerDevices(Customer $customer) {
		return $customer->devices;
	}

	public function getCustomerDevice(Customer $customer, $deviceId) {
		return $customer->devices()->where('id', $deviceId)->first();
	}
}