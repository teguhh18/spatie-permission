<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Jika belum login, arahkan ke halaman login.
            return redirect()->route('login');
        }
        if (Auth::user()->level === 'admin') {
            // Jika admin, lanjutkan permintaan.
            return $next($request);
        }
        // Jika sudah login tapi bukan admin, tampilkan error 403.
        abort(403, 'ANDA TIDAK MEMILIKI AKSES.');
    }
}
