<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('web')->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        if (auth('agency')->check()) {
            return redirect(RouteServiceProvider::AGENCY);
        }
       
        if (auth('agent')->check()) {
            return redirect(RouteServiceProvider::AGENT);
        }
        if (auth('front-user')->check()) {
            return redirect(RouteServiceProvider::USER);
        }


        return $next($request);
    }
}
