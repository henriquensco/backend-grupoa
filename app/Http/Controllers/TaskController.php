<?php

namespace App\Http\Controllers;

use App\Bridges\TaskBridge;
use App\DTO\CreateTaskDTO;
use App\DTO\UpdateTaskDTO;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(private TaskBridge $taskBridge)
    {
        $this->middleware('auth:api');
    }

    public function listTasks()
    {
        return response()->json($this->taskBridge->listTasks());
    }

    public function getTaskByUuid(string $uuid)
    {
        return response()->json($this->taskBridge->getTaskByUuid($uuid), 200); 
    }

    public function createTask(Request $request)
    {
        $dto = new CreateTaskDTO($request->all());

        if (!$dto) {
            return $dto->getError();
        }

        return response()->json($this->taskBridge->createTask($dto), 201);
    }

    public function updateTask(Request $request, string $uuid)
    {
        return response()->json($this->taskBridge->updateTask($request->all(), $uuid));
    }

    public function deleteTask(string $uuid)
    {
        return response()->json($this->taskBridge->deleteTask($uuid));
    }
}
