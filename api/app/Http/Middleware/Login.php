<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;

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

        $key = env('JWT_KEY');
        $email = "";
        $pass = "";

        try {
            $decoded = JWT::decode($request->getContent(), $key, array('HS256'));
            $request->logindata = $decoded;
            $email = $decoded->email;
            $pass = $decoded->password;

        } catch (\Exception $e) {
            return response("El token no es correcto",401);

        }

        $usuario = User::find($email);

        if (!$usuario) {
            Log::alert('Intento de acceso fallido del email: '.$email);
            return response("Credenciales incorrectas",401);

        }

        $userInfo = $usuario->getAttributes();

        if ($pass !== $userInfo['password']) {
            Log::alert('Intento de acceso fallido del email: '.$email);
            return response("Credenciales incorrectas",401);

        }

        if (!$userInfo['activo']) {
            Log::alert('Intento de acceso fallido del email: '.$email);
            return response("Este usuario no esta activo",401);
        }

        return $next($request);
    }
}
