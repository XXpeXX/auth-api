<?php

namespace App\Http\Middleware;

use Closure;
use \Firebase\JWT\JWT;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        try {
            $decoded = JWT::decode($request->getContent(), env('JWT_KEY'), array('HS256'));
            //$decoded_array = (array) $decoded;
            $request->logindata = $decoded;

        } catch (\Exception $e) {
            return response("El token no es correcto", 401);

        }


        return $next($request);
    }
}
