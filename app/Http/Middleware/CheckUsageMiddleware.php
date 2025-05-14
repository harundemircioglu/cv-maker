<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUsageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $feature): Response
    {
        if (!checkLimit($feature)) {
            return response()->json([
                'status' => 0,
                'message' => 'Kullanım hakkınız dolmuş.',
            ], 403);
        }

        return $next($request);
    }
}
