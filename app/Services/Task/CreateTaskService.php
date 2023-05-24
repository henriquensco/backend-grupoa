<?php

namespace App\Services\Task;

use App\Services\Interfaces\AbstractInterface;
use App\DTO\CreateTaskDTO;

class CreateTaskService implements AbstractInterface
{
    private CreateTaskDTO $data;
    
    public function __construct(CreateTaskDTO $data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        return $this->data;
    }
}
