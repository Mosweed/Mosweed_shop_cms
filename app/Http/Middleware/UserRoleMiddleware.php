<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        //    dd(Auth::user()->roleName);
        if (Auth::check()) {

            foreach ($roles as $role) {
                if (Auth::user()->roleName == $role) {
                    return $next($request);
                }
            }
        }

        return redirect(401);

    }
}
