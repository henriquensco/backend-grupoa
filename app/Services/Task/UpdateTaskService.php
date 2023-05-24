<?php

namespace App\Services\Task;

use App\DTO\UpdateTaskDTO;
use App\Services\Interfaces\AbstractInterface;

class UpdateTaskService implements AbstractInterface
{
    private array $data;
    private string $uuid;
    
    private $statusCode = 200;

    public function __construct(array $data, string $uuid)
    {
        $this->data = $data;
        $this->uuid = $uuid;
    }

    public function execute()
    {
        return $this->data;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
