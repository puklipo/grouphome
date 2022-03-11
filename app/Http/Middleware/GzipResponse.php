<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GzipResponse
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
        /** @var Response $response */
        $response = $next($request);

        if (in_array('gzip', $request->getEncodings()) && function_exists('gzencode')) {
            $response->setContent(gzencode($response->content(), 9));
            $response->headers->add([
                'Content-Encoding'      => 'gzip',
                'X-Vapor-Base64-Encode' => 'True',
            ]);
        }

        return $response;
    }
}
