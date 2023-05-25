<?php

namespace App\Services\Task;

use App\Services\Interfaces\AbstractInterface;
use App\DTO\CreateTaskDTO;
use App\Repositories\TaskRepository;

class CreateTaskService implements AbstractInterface
{
    private CreateTaskDTO $data;
    private TaskRepository $taskRepository;

    public function __construct(CreateTaskDTO $data)
    {
        $this->data = $data;
        $this->taskRepository = new TaskRepository();
    }

    public function execute(): CreateTaskDTO|array
    {
        try {
            $createTask = $this->taskRepository->createTask((array)$this->data);

            if (!$createTask) {
                return ['message' => 'Occurred a error when create the task', 'statusCode' => 401];
            }

            return ['data' => $this->data, 'statusCode' => 201];
        } catch (\Exception $error) {
            return ['message' => $error->getMessage(), 'statusCode' => 500];
        }
    }
}
