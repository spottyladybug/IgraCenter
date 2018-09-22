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
        if( \App\Settings::where('name', 'start')->exists() ) {
            if (Auth::check() && Auth::user()->group_user == 100) { // is admin
                return redirect()->route('admin.home');
            }
            elseif (Auth::check() && Auth::user()->group_user == 1) { // is moder
                // return view('Moders.moder');
                return $next($request);
            }
            elseif(Auth::check() && Auth::user()->group_user == 2) {
                // return view('Players.player');
                return redirect()->route('players.home');
            } else {
                return redirect()->route('app.main');
            }
        } else {
            return view('error', ['error' => 'Игра остановлена или еще не началась']);
        }
    }
}
