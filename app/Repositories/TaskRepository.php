<?php

namespace App\Repositories;

use App\DTO\CreateTaskDTO;
use App\DTO\UpdateTaskDTO;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Services\Task\CreateTaskService;
use App\Services\Task\ListTasksService;
use App\Services\Task\UpdateTaskService;

class TaskRepository implements TaskRepositoryInterface
{
    private $statusCode = 200;

    public function listTasks(): array
    {
        $listTasksService = new ListTasksService();

        $this->statusCode = $listTasksService->getStatusCode();

        return $listTasksService->execute();
    }

    public function createTask(CreateTaskDTO $params): CreateTaskDTO|array
    {
        $createTaskService = new CreateTaskService($params);
        
        $this->statusCode = $createTaskService->getStatusCode();
        
        return $createTaskService->execute();
    }

    public function updateTask(array $params, $uuid): UpdateTaskDTO|array
    {
        $updateTaskService = new UpdateTaskService($params, $uuid);
        
        $this->statusCode = $updateTaskService->getStatusCode();
        
        return $updateTaskService->execute();
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
