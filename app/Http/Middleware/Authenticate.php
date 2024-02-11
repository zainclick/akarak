<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

            if (!$request->expectsJson()) {
                if (Request::is(app()->getLocale().'/gency/*')) {
                    return route('agency-login');
                }elseif(Request::is(app()->getLocale().'/agent/*')){
                    return route('agent-login');
                }
                elseif(Request::is(app()->getLocale().'/admin/*')) {
                    return route('login');
                }
                elseif(Request::is(app()->getLocale().'/user/*')) {
                    return route('user-login');
                }
            
        }
    
}
}
