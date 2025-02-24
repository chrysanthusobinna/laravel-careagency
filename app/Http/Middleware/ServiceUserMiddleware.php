<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ServiceUserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !in_array(Auth::user()->role, ['service_user', 'family_member'])) {
            return redirect()->route('mainsite.home')->with('error', 'Access restricted to Service Users and Family Members.');
        }

        return $next($request);
    }
}
