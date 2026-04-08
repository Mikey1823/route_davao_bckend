<?php

declare(strict_types=1);

namespace App\Http\Middleware\RateLimit;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

final class AuthLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = 'auth:'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, 10)) {
            if ($request->expectsJson()) {
                return response()->json(data: ['message' => __('http-statuses.429')], status: Response::HTTP_TOO_MANY_REQUESTS);
            }

            return response()->view(view: 'errors.429', status: Response::HTTP_TOO_MANY_REQUESTS);
        }

        RateLimiter::hit($key);

        return $next($request);
    }
}
