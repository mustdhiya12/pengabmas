<?php

namespace App\Http\Middleware;

use App\Models\Cookie;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackCookieMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $cookieName = rand(); 
        $cookieValue = $request->cookie($cookieName);

        if (!$cookieValue && !Auth::check()) {
            $cookie = Cookie::create(['cookie_name' => $cookieName]);
            $response = $next($request)->withCookie(cookie($cookieName, $cookie->id, 1440)); // Masa berlaku cookie: 1 hari
        } else {
            $response = $next($request);
        }

        return $response;
    }
}
