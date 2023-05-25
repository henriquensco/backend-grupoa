<?php

namespace App\Services\Task;

use App\Models\Task;
use App\Services\Interfaces\AbstractInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;

class GetTaskService implements AbstractInterface
{
    private string $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function execute(): array
    {
        try {
            $task = Task::find($this->uuid);

            if (!$task) {
                throw new HttpException(404, 'The task was not found.');
            }

            $task->finished = $task->finished ? true : false; 

            return $task->toArray();
        } catch (HttpException $error) {
            throw new HttpException($error->getStatusCode(), $error->getMessage());
        }
    }
}
