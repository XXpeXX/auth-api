<?php

namespace App\Http\Middleware;

use App\User;
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
            $request->logindata = $decoded;

            $usuario = User::find($decoded->email);
            if (condition) {
                # code...
            }

        } catch (\Exception $e) {
            return response("El token no es correcto", 401);

        }


        return $next($request);
    }
}
