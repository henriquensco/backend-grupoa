<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository;
use App\Services\Interfaces\AbstractInterface;

class DeleteTaskService implements AbstractInterface
{
    private string $uuid;
    private TaskRepository $taskRepository;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
        $this->taskRepository = new TaskRepository();
    }

    public function execute(): array
    {
        try {
            $task = $this->taskRepository->deleteTask($this->uuid);

            if (!$task) {
                return ['message' => 'The task was not found.', 'statusCode' => 404];
            }

            return ['message' => 'Task deleted'];
        } catch (\Exception $error) {
            return ['message' => $error->getMessage(), 'statusCode' => 500];
        }
    }
}
