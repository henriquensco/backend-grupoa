<?php

namespace App\Repositories;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\ProfileService;
use App\Services\Auth\RegisterService;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(LoginDTO $data): LoginDTO | array
    {
        $loginService = new LoginService($data);

        return $loginService->execute();
    }

    public function register(RegisterDTO $data): RegisterDTO | array
    {
        $registerService = new RegisterService($data);

        return $registerService->execute();
    }

    public function me(): array|object
    {
        $profileService = new ProfileService();

        return $profileService->execute();
    }

    public function logout(): array|object
    {
        $logoutService = new LogoutService();

        return $logoutService->execute();
    }
}
