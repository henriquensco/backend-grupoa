<?php

namespace App\DTO;

use Illuminate\Support\Facades\Validator;

class LoginDTO
{
    public $email;
    public $password;

    private $error;

    public function __construct($request)
    {
        $this->email = $request['email'] ?? null;
        $this->password = $request['password'] ?? null;

        $this->validate();
    }

    protected function validate(): bool
    {
        $validation = Validator::make([
            'email' => $this->email,
            'password' => $this->password
        ], [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (!$validation->validate()) {
            $this->error = $validation->validate();
            return false;
        }

        return true;
    }

    public function getError(): array
    {
        return $this->error;
    }
}