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
		return redirect()->route('admin.dashboard');
	}

	public function logout()
	{
		Auth::logout();
		return redirect('/login');
	}
}
