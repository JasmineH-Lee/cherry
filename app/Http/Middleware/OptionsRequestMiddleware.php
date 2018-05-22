<?php

namespace App\Http\Middleware;

use Closure;

class OptionsRequestMiddleware
{
    /**
     * If the incoming request is an OPTIONS request
     * we will register a handler for the requested route
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('OPTIONS')) {
            return response('', 200);
        }
        return $next($request);
    }
}
