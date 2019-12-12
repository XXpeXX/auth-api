<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Firebase\JWT\JWT;

class LoginController extends Controller
{
    public function login(Request $request){

        $decoded = JWT::decode($request->getContent(), env('JWT_KEY'), array('HS256'));

        $decoded_array = (array) $decoded;

        return $decoded_array;
    }
}
