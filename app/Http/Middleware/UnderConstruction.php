<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UnderConstruction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(env('UNDER_CONSTRUCTION')){
            // Allow access to admin routes
            if ($request->is('admin') || $request->is('admin/*')) {
                return $next($request);
            }
    
            // Optionally, allow access to specific routes like login or assets
            if ($request->is('assets/*') || $request->is('uploads/*')) {
                return $next($request);
            }
    
            // Show under construction view
            return response()->view('under-construction');
        }

        return $next($request);
    }
}
