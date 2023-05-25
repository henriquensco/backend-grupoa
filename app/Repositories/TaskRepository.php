<?php

namespace App\Repositories;

use App\DTO\CreateTaskDTO;
use App\DTO\UpdateTaskDTO;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Services\Task\CreateTaskService;
use App\Services\Task\DeleteTaskService;
use App\Services\Task\GetTaskService;
use App\Services\Task\ListTasksService;
use App\Services\Task\UpdateTaskService;

class TaskRepository implements TaskRepositoryInterface
{
    public function listTasks(): array
    {
        $listTasksService = new ListTasksService();

        return $listTasksService->execute();
    }

    public function getTaskByUuid(string $uuid): array
    {
        $getTaskService = new GetTaskService($uuid);

        return $getTaskService->execute();
    }

    public function createTask(CreateTaskDTO $params): CreateTaskDTO|array
    {
        $createTaskService = new CreateTaskService($params);
                
        return $createTaskService->execute();
    }

    public function updateTask(array $params, string $uuid): UpdateTaskDTO|array
    {
        $updateTaskService = new UpdateTaskService($params, $uuid);
        
        return $updateTaskService->execute();
    }

    public function deleteTask(string $uuid): array
    {
        $deleteTaskService = new DeleteTaskService($uuid);
        
        return $deleteTaskService->execute();
    }

}
