<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockByIP
{
    /*
     * Get from db or file
    */
    protected $blocked = [ '111.1.1.1' ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow the user to contact with administrators using questions route
        if ($request->isMethod('post') && $request->routeIs('questions.store')) {
            return $next($request); 
        }

        if (in_array($request->getClientIp(), $this->blocked)) {
            abort(403);
        }
        
        return $next($request);
    }
}
