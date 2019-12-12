<?php

namespace App\Http\Middleware;

use Closure;
use \Firebase\JWT\JWT;

class Deszifrar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        $decoded = JWT::decode($request->getContent(), env('JWT_KEY'), array('HS256'));
        $decoded_array = (array) $decoded;
        $request->attributes->add(['decoded' => $decoded_array]);

        return $next($request);
    }
}
