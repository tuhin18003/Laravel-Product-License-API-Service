<?php

namespace App\Http\Middleware;

use Closure;

class CheckRegisterFlashData
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
        
        $value = $request->session()->get('registered');
        if( empty( $value ) ){
            return redirect( 'login' );
        }
         return $next($request);
    }
}
