<?php

namespace App\Bridges\Interfaces;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;

interface AuthBridgeInterface
{
    public function login(LoginDTO $data): LoginDTO | array;
    public function register(RegisterDTO $data): RegisterDTO | array;
    public function me(): array|object;
    public function logout(): array|object;
}
