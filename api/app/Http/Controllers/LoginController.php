<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Request $request){
        Log::info('Email: '.$request->logindata->email.' Password: '.$request->logindata->password);

        return 'Inicio de sesion correcto';
    }
}
