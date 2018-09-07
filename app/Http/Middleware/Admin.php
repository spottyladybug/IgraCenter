<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (Auth::check() && Auth::user()->group_user == 100) { // is admin
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->group_user == 1) { // is moder
            return view('Moders.moder');
        }
        elseif(Auth::check() && Auth::user()->group_user == 2) {
            return view('Players.player');
        }
    }
}
