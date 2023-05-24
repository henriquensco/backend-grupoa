<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        $token = auth()->attempt($credentials);

        if (!$token) {
            return response()->json(['error' => 'unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    private function respondWithToken(String $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => env('JWT_TTL', 60) / 60 . " Hours"
        ]);
    }
}
