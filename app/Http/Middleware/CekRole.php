<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (in_array(auth()->user()->role, $roles)) {
            return next($request);
        }
        return redirect('/login');
    }

    // App=>http=>kernel
    // 'CekRole' => \App\Http\Middleware\CekRole::class,
}
