<?php

namespace App\Repositories\Interfaces;

use App\DTO\CreateTaskDTO;

interface TaskRepositoryInterface
{
    public function listTasks();
    public function createTask(CreateTaskDTO $params): CreateTaskDTO|array;
    public function updateTask();
    public function deleteTask();
}
