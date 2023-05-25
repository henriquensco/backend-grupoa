<?php

namespace App\Services\Auth;

use App\DTO\RegisterDTO;
use App\Repositories\UserRepository;
use App\Services\Interfaces\AbstractInterface;

class RegisterService implements AbstractInterface
{
    private RegisterDTO $data;
    private UserRepository $userRepository;

    public function __construct(RegisterDTO $data)
    {
        $this->data = $data;
        $this->userRepository = new UserRepository();
    }

    public function execute()
    {
        try {
            $user = $this->userRepository->create((array)$this->data);

            if (!$user) {
                return ['message' => 'Occurred a error while create user.', 'statusCode' => 401];
            }

            return ['data' => $this->data, 'statusCode' => 201];
        } catch (\Exception $error) {
            return ['message' => $error->getMessage(), 'statusCode' => 500];
        }
    }
}
