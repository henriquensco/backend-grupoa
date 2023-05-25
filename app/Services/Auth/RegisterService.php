<?php

namespace App\Services\Auth;

use App\DTO\RegisterDTO;
use App\Models\User;
use App\Services\Interfaces\AbstractInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Str;

class RegisterService implements AbstractInterface
{
    private RegisterDTO $data;

    public function __construct(RegisterDTO $data)
    {
        $this->data = $data;    
    }

    public function execute()
    {
        try {
            $user = new User;

            if ($user->find(['email' => $this->data->email])) {
                throw new HttpException(401, 'Please, verify email and try again.'); 
            }

            $user->name = $this->data->name;
            $user->email = $this->data->email;
            $user->password = $this->data->password;
            $user->remember_token = Str::random(10);
        
            if (!$user->save()) {
                throw new HttpException(401, 'Occurred a error while create user.');
            }

            return $user->toArray();
        } catch (HttpException $error) {
            throw new HttpException($error->getStatusCode(), $error->getMessage());
        }
    }
}