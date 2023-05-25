<?php

namespace App\Http\Controllers;

use App\DTO\CreateTaskDTO;
use App\DTO\UpdateTaskDTO;
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
        return response()->json($this->taskRepository->listTasks());
    }

    public function createTask(Request $request)
    {
        $dto = new CreateTaskDTO($request->all());

        if (!$dto) {
            return $dto->getError();
        }

        return response()->json($this->taskRepository->createTask($dto), 201);
    }

    public function updateTask(Request $request, string $uuid)
    {
        return response()->json($this->taskRepository->updateTask($request->all(), $uuid));
    }

    public function deleteTask(string $uuid)
    {
        return response()->json($this->taskRepository->deleteTask($uuid));
    }
}
