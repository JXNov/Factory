<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Admin role == 1
            // Client role == 0

            if (Auth::user()->role == '1') {
                return $next($request);
            } else {
                return redirect()->route('/')->with('message', 'You do not have admin access.');
            }
        } else {
            return redirect()->route('login')->with('message', 'You must be logged in to access this page.');
        }

        return $next($request);
    }
}