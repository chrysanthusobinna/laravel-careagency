<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CareBeneficiaryMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role !== 'care_beneficiary') {
            return redirect()->route('mainsite.home')->with('error', 'Access restricted to Service Users only.');
        }

        return $next($request);
    }
}

