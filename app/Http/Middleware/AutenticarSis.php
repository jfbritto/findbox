<?php

namespace App\Http\Middleware;

use Closure;

class AutenticarSis
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
        if( session('id') == null ){
            return redirect('');
        }
        
        return $next($request);
    }
}
