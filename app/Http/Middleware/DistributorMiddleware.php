<?php

namespace App\Http\Middleware;

use Closure;

class DistributorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    if ($request->user() && $request->user()->role_id != '3')
    {
    return new Response(view('unauthorized')->with('role_id','1'));
    }
    return $next($request);
    }
}
