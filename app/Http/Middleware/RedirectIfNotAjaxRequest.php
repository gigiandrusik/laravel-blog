<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class RedirectIfNotAjaxRequest
 *
 * @package App\Http\Middleware
 */
class RedirectIfNotAjaxRequest
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->ajax()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}