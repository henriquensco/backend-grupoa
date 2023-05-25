<?php

namespace Tests\Feature;

use Tests\TestCase;

class TaskTest extends TestCase
{
    private $token = '';
    private $uuid = '';

    public function test_access_route_api(): void
    {
        $response = $this->get('/api');

        $response->assertStatus(404);
    }

    public function test_list_tasks(): void
    {
        $response = $this->response('GET', '/api/tasks');

        $response->assertStatus(200);
    }

    public function test_get_task_by_uuid(): void
    {
        $response = $this->response('GET', '/api/tasks/' . $this->uuid);

        $response->assertStatus(200);
    }

    public function test_create_task(): void
    {
        $body = [
            'title' => 'teste',
            'description' => 'teste'
        ];

        $response = $this->response('POST', '/api/tasks/create', $body);

        $response->assertStatus(201);
    }

    public function test_update_task(): void
    {
        $body = [
            'title' => '123',
            'description' => 'teste',
            'finished' => true
        ];

        $response = $this->response('PUT', '/api/tasks/update/' . $this->uuid, $body);

        $response->assertStatus(200);
    }

    public function test_delete_task(): void
    {
        $response = $this->response('DELETE', '/api/tasks/delete/' . $this->uuid);

        $response->assertStatus(200);
    }

    protected function response($method = 'GET', $uri, $body = null)
    {
        return $this->call($method, $uri, [], [], [], [
            'HTTP_AUTHORIZATION' => 'Bearer ' . $this->token,
            'CONTENT_TYPE' => 'application/json',
            'HTTP_ACCEPT' => 'application/json'
        ], json_encode($body));
    }
}
