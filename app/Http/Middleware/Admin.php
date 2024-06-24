<?php

namespace App\Http\Middleware;
use IlluminateSupportFacadesAuth;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpFoundation\Response;

class Admin 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() && Auth::user()->isAdmin() or Auth::user() && Auth::user()->isSeller()){
            return $next($request);
        }
        return redirect()->route('home_page');
        
    }

}
