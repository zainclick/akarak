<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Backend\agencies;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth('agency')->check()){
            $agency = auth('agency')->user();
        }elseif(auth('agent')->check()){
            $agent = auth('agent')->user()->agency;
            $agency = agencies::where('id',$agent)->first();
        }
        

        if($agency->subscription() != null){
            if($agency->subscription()->ends_at != null){
                return redirect()->route('front-pricing')->withErrors(['msg' => 'Your subscription Expired , Choose any plan to renew your subscripe to can use your account ']);
            }
        }else{
            return redirect()->route('front-pricing')->withErrors(['msg' => 'You are not subscriped for any plans , Choose any plan and subscripe to can use your account ']);
        }

        return $next($request);
    }
}
