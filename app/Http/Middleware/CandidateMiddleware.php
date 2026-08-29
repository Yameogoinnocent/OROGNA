<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CandidateMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        if (!auth()->check() || !auth()->user()->isCandidate()) {
            abort(403);
        }

        return $next($request);
    }
}