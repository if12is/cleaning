<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProxyDetectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $proxyHeaders = [
            '_PROXY',
            'HTTP_VIA',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED',
            'HTTP_CLIENT_IP',
            'HTTP_FORM',
            'HTTP_FORWARDED_FOR_IP',
            'HTTP_PRAGMA',
            'VIA',
            'X_FORWARDED_FOR',
            'FORWARDED_FOR',
            'X_FORWARDED',
            'FORWARDED',
            'CLIENT_IP',
            'FORWARDED_FOR_IP',
            'HTTP_PROXY',
            'PROXY_',
            'PROXY_HOST',
            'PROXY_PORT',
            'PROXY_REQUEST',
            'HTTP_PROXY_CONNECTION',
            'HTTP_CF_CONNECTING_IP',
            'HTTP_X',
            'HTTP_X_HOST',
            'HTTP_X_REFERER',
            'HTTP_X_BLUECOAT_VIA',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_X_SERVER_HOSTNAME',
            'HTTP_TRUE_CLIENT_IP',
            'HTTP_X_REAL_IP',
            'HTTP_X_CLIENT_IP',
        ];

        foreach ($proxyHeaders as $header) {
            if ($request->server($header)) {
                dd($header);
                return response()->json(['error' => 'Access via VPN/Proxy is not allowed'], 403);
            }
        }

        return $next($request);
    }
}
