<?php

namespace App\Services\Task;

use App\Services\Interfaces\AbstractInterface;

class DeleteTaskService implements AbstractInterface
{
    private string $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;    
    }

    public function execute(): array
    {
        return ['uuid' => $this->uuid];
    }
}