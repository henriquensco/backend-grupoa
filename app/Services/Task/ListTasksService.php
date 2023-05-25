<?php

namespace App\Services\Task;

use App\Models\Task;
use App\Services\Interfaces\AbstractInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ListTasksService implements AbstractInterface
{
    public function __construct()
    {
    }

    public function execute()
    {
        try {
            $listAllTasks = Task::all();

            $listAllTasks->map(function ($data) {
                $data->finished = $data->finished == 0 ? false : true;
            });

            return $listAllTasks->toArray();
        } catch (HttpException $error) {
            throw new HttpException($error->getStatusCode(), $error->getMessage());
        }
    }
}
