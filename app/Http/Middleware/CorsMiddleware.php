<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * 处理跨域请求
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        return $response->header('Access-Control-Allow-Origin', $request->header('origin'))
            ->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'))
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
    }
}
