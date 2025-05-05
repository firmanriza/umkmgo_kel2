<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles
     * @return mixed
     */
    // public function handle($request, Closure $next, ...$roles)
    // {
    //     if (Auth::check() && in_array(Auth::user()->role, $roles)) {
    //         return $next($request);
    //     }

    //     abort(403, 'Unauthorized access.');
    // }
    public function handle($request, Closure $next)
{
    if (Auth::check() && Auth::user()->role === 'admin') {
        return $next($request);
    }

    abort(403); // Forbidden jika bukan admin
}
}
