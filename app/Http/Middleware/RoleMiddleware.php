<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect('/');
        }


        if (!in_array(auth()->user()->role, $roles)) {
            return redirect('/');
        }

        return $next($request);
    }
}
