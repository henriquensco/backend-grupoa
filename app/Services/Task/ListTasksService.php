<?php

namespace App\Services\Task;

use App\Models\Task;
use App\Services\Interfaces\AbstractInterface;

class ListTasksService implements AbstractInterface
{
    private int $statusCode = 200;

    public function __construct()
    {
        
    }

    public function execute()
    {
        $listAllTasks = Task::all();

        return $listAllTasks->toArray();
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}