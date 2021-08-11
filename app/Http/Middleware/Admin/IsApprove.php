<?php

namespace App\Http\Middleware\Admin;

use App\Events\Admin\AdminLogout;
use Closure;
use Illuminate\Http\Request;

class IsApprove
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
        if(!auth('admin')->user()->status)
        {
            //event to reset active property
            event(new AdminLogout(auth('admin')->user()));

            auth('admin')->logout();
            return redirect()->route('admin.login')
                ->withErrors('You are not approve to access this page.');
        }
        return $next($request);
    }
}
