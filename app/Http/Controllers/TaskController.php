<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    public function __construct(private TaskRepository $taskRepository)
    {
        $this->middleware('auth:api');
    }

    public function listTasks()
    {
        return $this->taskRepository->listTasks();
    }

    public function createTask()
    {
        return $this->taskRepository->createTask();
    }

    public function updateTask()
    {
        return $this->taskRepository->updateTask();
    }

    public function deleteTask()
    {
        return $this->taskRepository->deleteTask();
    }
}
