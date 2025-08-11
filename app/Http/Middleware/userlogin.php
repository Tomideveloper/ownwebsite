<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class userlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('check_user') !="" && session()->get('check_confrim') ===0){
            return $next($request);
            // dd('allow');
        }
        else{
            // dd('no allow');
            return redirect('login');
        }
    }
}
