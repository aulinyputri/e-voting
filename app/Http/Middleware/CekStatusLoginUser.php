<?php

namespace App\Http\Middleware;

use Closure;

class CekStatusLoginUser
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
        if (session('login') == true) {
            return redirect('/home');
        }
        return $next($request);
    }
}
