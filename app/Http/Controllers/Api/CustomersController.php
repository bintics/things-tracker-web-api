<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Organization;

class CustomersController extends Controller
{

	public function __construct() {
		$this->checkDefaultUser();
	}

	public function checkDefaultUser() {
		// if(!Customer::count())
		{
			if(!Organization::count()) {
				Organization::create(['name' => 'admin@admin.com', 'alias' => 'admin', 'available' => true]);
			}
			$org = Organization::first();
			if(!$org->customers()->count()) {
				$org->customers()->create(['email' => 'admin@admin.com', 'password' => bcrypt('masterkey')]);
			}

			$customer = $org->customers()->first();
			if(!$customer->locations()->count()) {
				$customer->locations()->create(['name_zone' => 'CDMX', 'alias' => 'CDMX', 'latitude' => 19.42153376, 'longitude' => -99.1717797]);
			}

			if(!$customer->devices()->count()) {
				$customer->devices()->create(['name' => 'OmeAvispaXR23', 'alias' => 'Bici de José', 'serial_device' => 'OMEAXR23KL2017']);
			}
		}
	}

	public function getAll() {
		return Customer::all();
	}

	public function getCustomer(Customer $customer) {
		return $customer;
	}
}