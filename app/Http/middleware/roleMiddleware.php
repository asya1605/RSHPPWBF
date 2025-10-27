<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userRole = strtolower(session('role'));

        if ($userRole !== strtolower($role)) {
            return redirect()->route('home')->with('error', 'Akses ditolak. Anda bukan ' . ucfirst($role));
        }

        return $next($request);
    }
}
