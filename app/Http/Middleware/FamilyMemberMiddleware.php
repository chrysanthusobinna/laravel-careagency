<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class FamilyMemberMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role !== 'family_member') {
            return redirect()->route('mainsite.home')->with('error', 'Access restricted to Family Members only.');
        }

        return $next($request);
    }
}
