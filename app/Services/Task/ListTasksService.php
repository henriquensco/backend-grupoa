<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository;
use App\Services\Interfaces\AbstractInterface;

class ListTasksService implements AbstractInterface
{
    private TaskRepository $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    public function execute(): array
    {
        try {
            $listAllTasks = $this->taskRepository->getAllTasks();

            $listAllTasks->map(function ($data) {
                $data->finished = $data->finished == 0 ? false : true;
            });

            return $listAllTasks->toArray();
        } catch (\Exception $error) {
            return ['message' => $error->getMessage(), 'statusCode' => 500];
        }
    }
}
