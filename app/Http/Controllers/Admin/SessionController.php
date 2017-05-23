<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SessionController extends Controller
{
	public function getLogin() {
		return view('admin.login');
	}

	public function postLogin() {
		return 'Login';
	}
}