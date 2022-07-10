<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param String $role
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, String $role)
    {
        if($request->user()->role === $role) return $next($request);

        abort(403);
    }
}
