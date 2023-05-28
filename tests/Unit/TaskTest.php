<?php

namespace Tests\Unit;

use App\Bridges\TaskBridge;
use App\DTO\CreateTaskDTO;

class TaskTest extends \Tests\TestCase
{
    private $taskBridge;
    private $uuid;

    public function setUp(): void
    {
        parent::setUp();

        $this->taskBridge = new TaskBridge();

        $this->test_list_all_tasks();
    }

    public function test_list_all_tasks(): void
    {
        $listTasks = $this->taskBridge->listTasks();

        $this->assertIsArray($listTasks);
        $this->assertCount(count($listTasks), $listTasks);
        $this->assertArrayHasKey('uuid', $listTasks[0]);

        $this->uuid = $listTasks[0]['uuid'];
    }

    public function test_get_task_by_uuid(): void
    {
        $this->assertNotEmpty($this->uuid);

        $getTask = $this->taskBridge->getTaskByUuid($this->uuid);

        $this->assertIsArray($getTask);
        $this->assertArrayHasKey('statusCode', $getTask);
        $this->assertEquals(200, $getTask['statusCode']);
    }

    public function test_create_task(): void
    {
        $body = [
            'title' => 'teste',
            'description' => 'teste'
        ];

        $createTask = $this->taskBridge->createTask(new CreateTaskDTO($body));

        $this->assertIsArray($createTask);
        $this->assertArrayHasKey('statusCode', $createTask);
        $this->assertEquals(201, $createTask['statusCode']);
    }

    public function test_update_task(): void
    {
        $body = [
            'title' => 'teste update',
            'description' => 'teste update'
        ];

        $updateTask = $this->taskBridge->updateTask($body, $this->uuid);

        $this->assertIsArray($updateTask);
        $this->assertArrayHasKey('statusCode', $updateTask);
        $this->assertEquals(200, $updateTask['statusCode']);
    }

    public function test_delete_task(): void
    {
        $deleteTask = $this->taskBridge->deleteTask($this->uuid);

        $this->assertIsArray($deleteTask);
        $this->assertArrayHasKey('message', $deleteTask);
        $this->assertEquals(200, $deleteTask['statusCode']);
    }
}
