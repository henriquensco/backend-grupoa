<?php

namespace Tests\Unit;

use App\Bridges\TaskBridge;
use App\Repositories\TaskRepository;
use App\Services\Task\ListTasksService;


class TaskTest extends \Tests\TestCase
{

    public $taskBridge;
    public $taskModel;
    public $taskRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->taskRepository = new TaskRepository();

        $this->taskBridge = $this->getMockBuilder(TaskBridge::class)
            ->getMock();
    }
    
    public function test_get_all_tasks(): void
    {
        $listTasks = $this->taskBridge->listTasks();

        $this->assertIsArray($listTasks);
    }

    public function test_delete_task(): void
    {
        $deleteTask = $this->taskBridge->deleteTask('uuid');
        $this->assertIsArray($deleteTask);
    }
}

