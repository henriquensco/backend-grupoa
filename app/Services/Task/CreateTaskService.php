<?php

namespace App\Services\Task;

use App\Services\Interfaces\AbstractInterface;
use App\DTO\CreateTaskDTO;
use App\Models\Task;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CreateTaskService implements AbstractInterface
{
    private CreateTaskDTO $data;

    public function __construct(CreateTaskDTO $data)
    {
        $this->data = $data;
    }

    public function execute(): CreateTaskDTO|array
    {
        try {
            $task = new Task;

            $task->title = $this->data->title;
            $task->description = $this->data->description;

            $task->save();

            return $this->data;
        } catch (HttpException $error) {
            throw new HttpException($error->getStatusCode(), $error->getMessage());
        }
    }
}
