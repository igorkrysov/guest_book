<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      //  dd(Auth::user()->group_id);
        if (Auth::guard($guard)->check() && Auth::user()->group_id == 1) {
          return $next($request);
        }
        else{
          return redirect('/home');
        }

    }
}
