<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
	public function getRegister() {
		return view('admin.login');
	}

	public function postRegister() {
		return 'Login';
	}
}