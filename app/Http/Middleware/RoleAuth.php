<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleAuth
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next, $roles)
	{
		$roles = explode('|', $roles);
		if (Auth::check()) {
			if (in_array(strtolower(Auth::user()->role->name), $roles)) {
				return $next($request);
			} else {
				return abort(401);
			}
		}
		return redirect('login');
	}
}
