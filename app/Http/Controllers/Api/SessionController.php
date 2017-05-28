<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Auth;

class SessionController extends Controller
{
	public function postLogin(Request $request) {
		$email = $request->input('email');
		$password = $request->input('password');

		$customer = Customer::where('email', $email)->first();
		if(!is_null($customer)) {
			if(Hash::check($password, $customer->password)) {
				return $customer;
			}
		}
		return response(403);
	}
}