<?php

namespace Carnet\Http\Middleware;

use Redirect;
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
    {z
        if (Auth::guard($guard)->check()) {
            return redirect(route('admin.dashboard'));
        }

        return $next($request);
    }
}
