<?php

namespace App\Services\Auth;

use App\Services\Interfaces\AbstractInterface;

class LogoutService implements AbstractInterface
{
    public function __construct()
    {
    }

    public function execute(): array
    {
        auth()->logout();

        return ['message' => 'Successfully logged out', 'statusCode' => 200];
    }
}
