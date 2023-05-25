<?php

namespace App\Http\Controllers;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\Bridges\AuthBridge;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    public function __construct(private AuthBridge $authBridge)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $loginDto = new LoginDTO($request);

        if (!$loginDto) {
            return $loginDto->getError();
        }

        return response()->json($this->authBridge->login($loginDto), 200);
    }

    public function register(Request $request)
    {
        $registerDto = new RegisterDTO($request);

        if (!$registerDto) {
            return $registerDto->getError();
        }

        return response()->json($this->authBridge->register($registerDto), 201);
    }

    public function me()
    {
        return response()->json($this->authBridge->me(), 200);
    }

    public function logout()
    {
        return response()->json($this->authBridge->logout(), 200);
    }
}
