<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Dev
{
	/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {   
        if(env('AUTH')) {
			if(!Auth::check()) Auth::loginUsingId(1);
		} else {
            Auth::logout();
        }

        return $next($request);
    }
}

?>