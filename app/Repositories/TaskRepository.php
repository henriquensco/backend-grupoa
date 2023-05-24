<?php

namespace App\Repositories;

use App\DTO\CreateTaskDTO;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Services\Task\CreateTaskService;

class TaskRepository implements TaskRepositoryInterface
{
    public function listTasks()
    {
        return [];
    }

    public function createTask(CreateTaskDTO $params): CreateTaskDTO|array
    {
        $createTask = new CreateTaskService($params);
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
}
