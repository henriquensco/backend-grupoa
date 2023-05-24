<?php

namespace App\Services\Task;

use App\Services\Interfaces\AbstractInterface;
use App\DTO\CreateTaskDTO;
use App\Models\Task;
use Exception;

class CreateTaskService implements AbstractInterface
{
    private CreateTaskDTO $data;

    private int $statusCode = 201;

    public function __construct(CreateTaskDTO $data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        try {
            $task = new Task;

            $task->title = $this->data->title;
            $task->description = $this->data->description;

            $task->save();

            return $this->data;
        } catch (Exception $error) {
            //var_dump($error);
            return ['message' => $error];
        }
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
