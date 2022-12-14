<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestParams
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
        if (!empty($request['limit'])) {
            config()->set('site.pagination.limit', $request->limit);
        }

        return $next($request);
    }
}
