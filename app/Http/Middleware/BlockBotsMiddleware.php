<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class BlockBotsMiddleware
{
    public function handle($request, Closure $next)
    {
        $botUserAgents = ['bot', 'crawler', 'spider', 'curl', 'python', 'scrapy'];
        $userAgent = strtolower($request->header('User-Agent'));
    
        foreach ($botUserAgents as $bot) {
            if (strpos($userAgent, $bot) !== false) {
                Log::warning('Bot User-Agent detected', ['user_agent' => $userAgent, 'ip' => $request->ip()]);
                abort(403, 'Bot activity detected.');
            }
        }
    
        return $next($request);
    }
    
}
