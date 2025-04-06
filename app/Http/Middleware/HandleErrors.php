<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleErrors
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!$response->exception) {
            return $response;
        }

        return response()->view('errors.500', [], 500);
    }
} 