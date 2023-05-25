<?php

namespace App\Repositories\Interfaces;

use App\DTO\CreateTaskDTO;
use App\DTO\UpdateTaskDTO;

interface TaskRepositoryInterface
{
    public function listTasks(): array;
    public function getTaskByUuid(string $uuid): array;
    public function createTask(CreateTaskDTO $params): CreateTaskDTO|array;
    public function updateTask(array $params, string $uuid): UpdateTaskDTO|array;
    public function deleteTask(string $uuid): array;
}
