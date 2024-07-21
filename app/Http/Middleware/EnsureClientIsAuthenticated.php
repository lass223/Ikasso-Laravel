<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureClientIsAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('client')->check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion des clients si non authentifié
        }

        return $next($request);
    }
}