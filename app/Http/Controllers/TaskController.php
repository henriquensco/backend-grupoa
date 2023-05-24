<?php

namespace App\Http\Controllers;

use App\DTO\CreateTaskDTO;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

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

    public function createTask(Request $request)
    {   
        $dto = new CreateTaskDTO($request->all());

        if (!$dto) {
            return $dto->getError();
        }

        return response()->json($this->taskRepository->createTask($dto), 201);
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
