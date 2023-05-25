<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository;
use App\Services\Interfaces\AbstractInterface;

class UpdateTaskService implements AbstractInterface
{
    private array $data;
    private string $uuid;

    private TaskRepository $taskRepository;

    public function __construct(array $data, string $uuid)
    {
        $this->data = $data;
        $this->uuid = $uuid;

        $this->taskRepository = new TaskRepository();
    }

    public function execute(): array
    {
        try {
            if (isset($this->data['finished']) && $this->data['finished']) {
                $this->data['finished_at'] = new \DateTime();
            } else if (isset($this->data['finished']) && !$this->data['finished']) {
                $this->data['finished_at'] = null;
            }

            $task = $this->taskRepository->updateTask($this->uuid, $this->data);

            if (!$task) {
                return ['message' => 'The task was not found.', 'statusCode' => 404];
            }

            return $this->data;
        } catch (\Exception $error) {
            return ['message' => $error->getMessage(), 'statusCode' => 500];
        }
    }
}
