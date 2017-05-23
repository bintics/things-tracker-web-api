<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class RegisterController extends Controller
{
	public function getRegister() {
		$customer = new Customer;
		return view('register', ['customer' => $customer]);
	}

	public function postRegister(Customer $customer) {
		return $customer;
	}
}