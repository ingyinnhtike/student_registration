<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class custom_auth
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
        
    if($request->_token)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return $next($request);
        }
    }
    
    }
}
