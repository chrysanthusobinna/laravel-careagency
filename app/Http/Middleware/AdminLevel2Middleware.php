<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminLevel2Middleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role !== 'admin_level_2') {
            return redirect()->route('mainsite.home')->with('error', 'Access restricted to Admin Level 2.');
        }

        return $next($request);
    }
}
