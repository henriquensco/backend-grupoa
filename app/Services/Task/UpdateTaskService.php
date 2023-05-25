<?php

namespace App\Services\Task;

use App\DTO\UpdateTaskDTO;
use App\Models\Task;
use App\Services\Interfaces\AbstractInterface;
use DateTime;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UpdateTaskService implements AbstractInterface
{
    private array $data;
    private string $uuid;

    public function __construct(array $data, string $uuid)
    {
        $this->data = $data;
        $this->uuid = $uuid;
    }

    public function execute(): array
    {
        try {
            if ($this->data['finished']) {
                $this->data['finished_at'] = new DateTime();
            } else {
                $this->data['finished_at'] = null;
            }

            $task = Task::where('uuid', $this->uuid)
                ->update($this->data);

            if (!$task) {
                throw new HttpException(404, 'The task was not found.');
            }

            return $this->data;
        } catch (HttpException $error) {
            throw new HttpException($error->getStatusCode(), $error->getMessage());
        }
    }
}
