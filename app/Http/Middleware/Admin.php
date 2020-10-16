<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $destinations = [
            1=>'suadmin',
            3=>'moderator',
            4=>'home',
        ];
        if (!Auth::check()){
            return redirect() ->route('login');
        }   
        if (Auth::user()->role!= 2){
            return redirect()->route($destinations[Auth::user()->role]);
        }
        return $next($request);
    }
}
