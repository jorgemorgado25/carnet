<?php

namespace Carnet\Http\Middleware;

use Session;
use Redirect;

use Closure;

class Carnet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('carnet'))
        {
            return $next($request);
        }else
        {
            Session::flash('session-carnet', true);
            return Redirect::route('front.index');
        }
        
    }
}
