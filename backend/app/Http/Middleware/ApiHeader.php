<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ApiHeader
{
    public function handle($request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
