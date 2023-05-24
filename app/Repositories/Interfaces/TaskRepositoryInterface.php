<?php

namespace App\Repositories\Interfaces;

interface TaskRepositoryInterface
{
    public function listTasks();
    public function createTask();
    public function updateTask();
    public function deleteTask();
}