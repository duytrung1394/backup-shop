<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
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
        //check login
        if(Auth::check())
        {
            //if level = 2, the return next request
            if(Auth::user()->level ==2)
            {
                return $next($request); 
            }
            else{
                return redirect("admin/login");
            }
        }else{
            return redirect("admin/login");
        }
     
    }
}
