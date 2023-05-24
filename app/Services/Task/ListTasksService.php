<?php

namespace App\Services\Task;

use App\Services\Interfaces\AbstractInterface;

class ListTasksService implements AbstractInterface
{
    private $statusCode = 200;

    public function __construct()
    {
        
    }

    public function execute()
    {
        return ['data' => []];
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}