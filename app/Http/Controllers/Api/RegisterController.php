<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Models\Customer;
use App\Models\Organization;

class RegisterController extends Controller
{
	public function getRegister() {
		$customer = new Customer;
		return view('register', ['customer' => $customer]);
	}

	public function postRegister(Customer $customer) {
		return $customer;
	}

	public function postExternalRegistry(Request $request) {
		$email = $request->input('email');
		$password = $request->input('password');
		$confirm_password = $request->input('confirmPassword');

		$custR = Customer::where('email', $email)->first();
		if(!is_null($custR)) {
			return ['message' => "El email $email ya se encuentra registrado.", 'error' => true];
		}

		if($password !== $confirm_password) {
			return ['message' => "El password no coincide.", 'error' => true];
		}

		try {
			DB::beginTransaction();
			$org = Organization::create(['name' => $email]);
			$org->customers()->create(['email' => $email, 'password' => bcrypt($password), 'available' => true]);
			DB::commit();
			return ['data' => "Felicidades!, ya te has registrado.", 'error' => false];
		} catch(Exception $ex) {
			DB::rollBack();
			return ['message' => "No fue posible realizar el registro.", 'error' => true, 'data' => $ex->getMessage()];
		}
	}
}