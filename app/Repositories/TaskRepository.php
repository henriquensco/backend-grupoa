<?php

namespace App\Repositories;

use App\DTO\CreateTaskDTO;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Services\Task\CreateTaskService;

class TaskRepository implements TaskRepositoryInterface
{
    private $statusCode = 401;

    public function listTasks()
    {
        return [];
    }

    public function createTask(CreateTaskDTO $params): CreateTaskDTO|array
    {
        $createTask = new CreateTaskService($params);
        
        $this->statusCode = $createTask->getStatusCode();
        
        return $createTask->execute();
    }

    public function updateTask()
    {
        return [];
    }

    public function deleteTask()
    {
        return [];
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
