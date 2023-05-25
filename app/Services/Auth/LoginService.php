<?php

namespace App\Services\Auth;

use App\DTO\LoginDTO;
use App\Services\Interfaces\AbstractInterface;

class LoginService implements AbstractInterface
{
    private LoginDTO $data;

    public function __construct(LoginDTO $data)
    {
        $this->data = $data;
    }

    public function execute(): LoginDTO | array
    {
        try {
            $token = auth()->attempt([
                'email' => $this->data->email,
                'password' => $this->data->password
            ]);

            if (!$token) {
                return ['message' => 'unauthorized', 'statusCode' => 401];
            }

            return $this->respondWithToken($token);
        } catch (\Exception $error) {
            return ['message' => $error->getMessage(), 'statusCode' => 401];
        }
    }

    private function respondWithToken(String $token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => env('JWT_TTL', 60) / 60 . " Hours"
        ];
    }
}
