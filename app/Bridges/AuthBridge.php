<?php

namespace App\Bridges;

use App\Bridges\Interfaces\AuthBridgeInterface;
use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\ProfileService;
use App\Services\Auth\RegisterService;

class AuthBridge implements AuthBridgeInterface
{
    private int $statusCode = 200;

    public function login(LoginDTO $data): LoginDTO | array
    {
        $loginService = new LoginService($data);
        return $this->response($loginService->execute());
    }

    public function register(RegisterDTO $data): RegisterDTO | array
    {
        $registerService = new RegisterService($data);
        return $this->response($registerService->execute());
    }

    public function me(): array|object
    {
        $profileService = new ProfileService();
        return $this->response($profileService->execute());
    }

    public function logout(): array|object
    {
        $logoutService = new LogoutService();
        return $this->response($logoutService->execute());
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    private function response($response)
    {        
        $this->statusCode = $response['statusCode'] ?? 200;
        return $response;
    }

}
