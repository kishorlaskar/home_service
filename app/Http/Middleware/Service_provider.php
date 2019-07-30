<?php

namespace App\Http\Middleware;

use Closure;

class Service_provider
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
         if ($request->session()->get('Service_provider') === true) {
             return $next($request);
        }
     return redirect()->route('provider_login');
    }
}
