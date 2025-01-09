<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Periksa apakah user sudah login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to access this page.');
        }

        // Periksa apakah role Spatie telah di-assign ke user
        if (!$user->hasAnyRole($roles)) {
            // return abort(403, 'You do not have the required permissions to access this page.');
            return redirect()->route('404');
        }

        return $next($request);
    }
}
