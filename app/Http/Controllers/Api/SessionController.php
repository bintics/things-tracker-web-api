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
				return ['id' => $customer->id,
						'email' => $customer->email,
						'api_token' => $customer->api_token,
						'firstName' => is_null($customer->details) ? $customer->email : $customer->details->first_name,
						'lastName' => is_null($customer->details) ? $customer->email : $customer->details->last_name
						];
			}
		}
		return response('Unauthorized.', 401);
	}
}