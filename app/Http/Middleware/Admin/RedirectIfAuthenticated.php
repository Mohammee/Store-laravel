<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
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
        if(auth('admin')->check())
        {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
