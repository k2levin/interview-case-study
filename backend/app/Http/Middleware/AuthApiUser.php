<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthApiUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('api')->check()) {
            return $next($request);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
