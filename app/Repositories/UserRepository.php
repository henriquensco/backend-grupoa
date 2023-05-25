<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;

class UserRepository
{
    private User $userModel;
    
    public function __construct()
    {
        $this->userModel = new User();    
    }

    public function create($data)
    {
        $data['remember_token'] = Str::random(10);

        $create = $this->userModel->create($data);
        return $create->save();
    }
}