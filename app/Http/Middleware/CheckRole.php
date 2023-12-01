<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!$request->user()) {
            return redirect('/login');
        }

        // Check the user's role
        $userRole = $request->user()->role;

        // Roles that are allowed to access the route
        $allowedRoles = ['admin'];

        // Check if the user's role is allowed
        if (!in_array($userRole, $allowedRoles)) {
            // Redirect or respond as needed for unauthorized users
            return response('Unauthorized. You do not have the required role.', 403);
        }

        return $next($request);
    }
}
