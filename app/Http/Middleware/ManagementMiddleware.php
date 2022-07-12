<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;
class ManagementMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }

     public function handle($request, Closure $next)
            {
            if ($request->user() && $request->user()->role_id != '3')
            {
            return new Response(view('unauthorized')->with('role_id','3'));
            }
            return $next($request);
            }
}
