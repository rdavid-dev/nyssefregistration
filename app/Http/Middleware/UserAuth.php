<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserAuth {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'frontend') {
//        if (!Auth::guard($guard)->guest()) {
//            return redirect()->route('user-dashboard');
//        }
        return $next($request);
    }

}
