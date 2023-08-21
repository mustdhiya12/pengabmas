<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie as LaravelCookie;

class TrackCookieMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $cookieName = rand(); 
        $cookieValue = $request->cookie($cookieName);

        if (!$cookieValue && !Auth::check()) {
            $failedLoginAttempts = session('failed_login_attempts', 0);
            
            if ($failedLoginAttempts >= 3) {
                LaravelCookie::queue(LaravelCookie::forget($cookieName));
                session(['failed_login_attempts' => 0]);
            } else {
                $failedLoginAttempts++;
                session(['failed_login_attempts' => $failedLoginAttempts]);
            }
            
            $response = $next($request);
        } else {
            $response = $next($request);
        }

        return $response;
    }
}
