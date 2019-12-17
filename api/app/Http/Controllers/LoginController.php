<?php

namespace App\Http\Controllers;

use App\Acceso;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Request $request){
        Log::info('Email: '.$request->logindata->email.' Password: '.$request->logindata->password);

        $acceso = new Acceso;

        try {
            $acceso->email = $request->logindata->email;
            $acceso->fecha_acceso = date('Y-m-d H:i:s');
            $acceso->save();
            Log::info('Acceso guardado correctamente');

        } catch (\Exception $e) {
            Log::alert('Error al guardar el acceso');
            return 'Error de acceso';
        }

        return 'Inicio de sesion correcto';
    }
}
