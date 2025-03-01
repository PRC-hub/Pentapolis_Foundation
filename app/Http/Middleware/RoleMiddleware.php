<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated and has user_type = 'Employee'
        if (Auth::check() && Auth::user()->user_type === 'Employee') {
            return $next($request);
        }

        // Redirect if not an Employee
        return redirect()->route('login')->with('error', 'Access denied. Employees only.');
    }
}
