<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next, ...$guards){
        if(!auth()->check()){
            
            return redirect()->route('login-page')->withErrors('Log in to access the page');
            
        }
        
        return $next($request);
    }



    //  protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }
}
