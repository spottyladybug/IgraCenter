<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Moder
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
        if (Auth::check() && Auth::user()->user_group == 0) { // is admin
            return redirect('admin');
        }
        elseif (Auth::check() && Auth::user()->role == 1) { // is moder
            return $next($request);
        }
        else {
            return redirect('/routes_log');
        }
    }
}
