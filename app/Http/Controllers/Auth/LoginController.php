<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	//
	public function index()
	{
		return view('client.auth.login');
	}

	public function store(Request $request)
	{
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			return redirect()->route('student');
		} else {
			session()->flash('error', 'Email hoặc mật khẩu không đúng');
			return redirect()->back();
		}
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('login');
	}
}
