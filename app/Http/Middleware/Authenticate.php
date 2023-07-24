<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Cek apakah permintaan menggunakan JSON
        if (! $request->expectsJson()) {
            
            return route('user.sign_in');

        }

        // Jika tidak ada kondisi yang sesuai, kembalikan null
        return null;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }

        // Panggil fungsi redirectTo untuk mendapatkan alamat redirect yang sesuai
        $redirect = $this->redirectTo($request);

        // Jika alamat redirect tidak null, lakukan redirect ke halaman yang sesuai
        if ($redirect !== null) {
            return redirect($redirect);
        }

        // Jika tidak ada redirect yang dilakukan, lanjutkan permintaan
        return $next($request);
    }
}
