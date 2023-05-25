<?php

namespace App\Bridges;

use App\Bridges\Interfaces\TaskBridgeInterface;
use App\DTO\CreateTaskDTO;
use App\DTO\UpdateTaskDTO;
use App\Services\Task\CreateTaskService;
use App\Services\Task\DeleteTaskService;
use App\Services\Task\GetTaskService;
use App\Services\Task\ListTasksService;
use App\Services\Task\UpdateTaskService;

class TaskBridge implements TaskBridgeInterface
{
    private int $statusCode = 200;

    public function listTasks(): array
    {
        $listTasksService = new ListTasksService();
        return $this->response($listTasksService->execute());
    }

    public function getTaskByUuid(string $uuid): array
    {
        $getTaskService = new GetTaskService($uuid);
        return $this->response($getTaskService->execute());
    }

    public function createTask(CreateTaskDTO $params): CreateTaskDTO|array
    {
        $createTaskService = new CreateTaskService($params);
        return $this->response($createTaskService->execute());
    }

    public function updateTask(array $params, string $uuid): UpdateTaskDTO|array
    {
        $updateTaskService = new UpdateTaskService($params, $uuid);
        return $this->response($updateTaskService->execute());
    }

    public function deleteTask(string $uuid): array
    {
        $deleteTaskService = new DeleteTaskService($uuid);
        return $this->response($deleteTaskService->execute());
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    private function response($response)
    {        
        $this->statusCode = $response['statusCode'] ?? 200;
        return $response;
    }

}
