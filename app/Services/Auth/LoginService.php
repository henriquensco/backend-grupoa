<?php

namespace App\Services\Auth;

use App\DTO\LoginDTO;
use App\Services\Interfaces\AbstractInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
                throw new HttpException(401, 'unauthorized');
            }

            return $this->respondWithToken($token);
        } catch (HttpException $error) {
            throw new HttpException($error->getStatusCode(), $error->getMessage());
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
