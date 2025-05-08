<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTeacherOrAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)) {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}