<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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

        if ($this->isEncodable($request, $response)) {
            $response->setContent(gzencode($response->getContent(), 9))
                     ->withHeaders([
                         'Content-Encoding' => 'gzip',
                         'X-Vapor-Base64-Encode' => 'True',
                     ]);
        }

        return $response;
    }

    /**
     * @param  Request  $request
     * @param  mixed  $response
     * @return bool
     */
    protected function isEncodable(Request $request, mixed $response): bool
    {
        return in_array('gzip', $request->getEncodings())
            && function_exists('gzencode')
            && ! $response instanceof BinaryFileResponse;
    }
}
