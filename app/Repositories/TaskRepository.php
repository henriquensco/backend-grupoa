<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    private Task $taskModel;

    private string $uuid = '';
    
    public function __construct()
    {
        $this->taskModel = new Task();    
    }

    public function getAllTasks($orderBy = 'DESC')
    {
        return $this->taskModel->orderBy('created_at', $orderBy)->get();
    }

    public function findTask(string $uuid)
    {
        return $this->taskModel->find($uuid);
    }

    public function createTask($data)
    {
        $task = $this->taskModel->create($data);
        $this->uuid = $task->uuid;
        return $task->save();
    }

    public function updateTask(string $uuid, array $data)
    {
        return $this->taskModel->where('uuid', $uuid)->update($data);
    }

    public function deleteTask(string $uuid)
    {
        $task = $this->findTask($uuid);

        return $task ? $task->delete() : false;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

}