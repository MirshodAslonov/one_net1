<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Example: Restrict access based on a condition
        if ($request->user() && $request->user()->is_admin == 0) {
            return redirect('/unauthorized'); // Redirect if condition fails
        }

        return $next($request); // Proceed to the next middleware or controller
    }
}
