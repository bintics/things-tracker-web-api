<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Auth;

class SessionController extends Controller
{
	// cuando get: ?api_token=[token]
	// cuando post, put, patch y delete, api_token=[token] como parte del body
	public function postLogin(Request $request) {
		$email = $request->input('email');
		$password = $request->input('password');

		$customer = Customer::where('email', $email)->first();
		if(!is_null($customer)) {
			if(Hash::check($password, $customer->password)) {
				$customer->api_token = str_random(60);
				$customer->save();
				return ['id' => $customer->id,
						'email' => $customer->email,
						'apiToken' => $customer->api_token,
						'firstName' => is_null($customer->details) ? $customer->email : $customer->details->first_name,
						'lastName' => is_null($customer->details) ? $customer->email : $customer->details->last_name,
						'createdAt' => $customer->created_at,
						'updatedAt' => $customer->updated_at,
						'available' => $customer->available
						];
			}
		}
		return response('Unauthorized.', 401);
	}
}