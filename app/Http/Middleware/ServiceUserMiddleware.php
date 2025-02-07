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
        if (!Auth::check() || Auth::user()->role !== 'service_user') {
            return redirect()->route('mainsite.home')->with('error', 'Access restricted to Service Users.');
        }

        return $next($request);
    }
}
