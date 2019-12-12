<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Request $request){
        Log::alert('Email: '.$request->get('decoded')['email'].' Password: '.$request->get('decoded')['password']);

        return 'Inicio de sesion correcto';
    }
}
