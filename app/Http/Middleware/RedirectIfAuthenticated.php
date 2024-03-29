<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        // echo $guard;
        // dd(Auth::guard($guard)->check());
        if ($guard == "client" && Auth::guard($guard)->check()) {
                return $next($request);
        }
        if ($guard == "user" && Auth::guard($guard)->check()) {
                return $next($request);
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/');
        }
            return redirect('/');
    }
}
