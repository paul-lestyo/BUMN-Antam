<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function index()
	{
		return view('auth.index');
	}

	public function login(Request $request)
	{
		$request->validate([
			'email' => 'required|email',
			'password' => 'required'
		]);
		$credentials = $request->only(['email', 'password']);
		if (!Auth::attempt($credentials)) {
			return back()->with("msg", "Login gagal");
		}

		if (auth()->user()->role_id == 2) {
			$route = "admin.dashboard";
		} else {
			$route = "pegawai.dashboard";
		}
		return redirect()->route($route);
	}

	public function logout()
	{
		Auth::logout();
		return redirect('/login');
	}
}
