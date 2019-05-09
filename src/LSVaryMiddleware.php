<?php

namespace Litespeed\LSCache;

use Closure;

class LSVaryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $lscache_vary
     * @return mixed
     */
    public function handle($request, Closure $next, string $lscache_vary = null)
    {
        $response = $next($request);

        if (! $request->isMethodCacheable() || ! $response->getContent()) {
            return $response;
        }

        if(isset($lscache_vary)) {
            $lscache_string = str_replace(';', ',', $lscache_vary);
        }

        if($response->headers->has('X-LiteSpeed-Vary') == false) {
            $response->headers->set('X-LiteSpeed-Vary', $lscache_string);
        }

        return $response;
    }
}
