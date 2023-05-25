<?php

namespace App\Services\Auth;

use App\Services\Interfaces\AbstractInterface;

class ProfileService implements AbstractInterface
{
    public function __construct()
    {
        
    }

    public function execute(): array|object
    {
        return auth()->user();
    }
}