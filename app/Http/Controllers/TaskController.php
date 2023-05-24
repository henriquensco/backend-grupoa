<?php

namespace App\Http\Controllers;

class TaskController extends Controller
{
    public function __construct()
    {
        
    }

    public function listTasks()
    {
        return 'listTasks';
    }

    public function createTask()
    {
        return 'createTask';
    }

    public function updateTask()
    {
        return 'updateTask';
    }

    public function deleteTask()
    {
        return 'deleteTask';
    }
}