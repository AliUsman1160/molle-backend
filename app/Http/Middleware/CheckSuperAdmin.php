<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSuperAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_superadmin) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'You do not have access to this page.');
    }
}
