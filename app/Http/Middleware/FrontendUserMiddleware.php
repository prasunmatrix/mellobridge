<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;

class FrontendUserMiddleware
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
      if(!\Auth::guard('frontenduser')->check()){
        return Redirect::route('login');
    }
      return $next($request);
    }
}
