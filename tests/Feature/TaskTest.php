<?php

namespace Tests\Feature;

use Tests\TestCase;

class TaskTest extends AuthTest
{
    // It will automatically replaced by the test 
    public string $uuid = '';

    public function setUp(): void
    {
        parent::setUp();

        $this->test_list_tasks();
    }

    public function test_access_route_headers_with_token(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->get('/api/tasks');

        $response->assertStatus(200);
    }

    public function test_access_route_api(): void
    {
        $response = $this->get('/api');

        $response->assertStatus(404);
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

    public function test_list_tasks(): void
    {
        $response = $this->response('GET', '/api/tasks');

        $response->assertStatus(200)->assertJsonStructure(['*' => [
            'uuid',
		    'title',
		    'description',
		    'finished',
		    'finished_at',
		    'created_at',
		    'updated_at'
        ]]);

        $this->uuid = $response[0]['uuid'];

        $this->assertNotEmpty($this->uuid);
    }

    public function test_get_task_by_uuid(): void
    {
        $response = $this->response('GET', '/api/tasks/' . $this->uuid);

        $response->assertStatus(200)
            ->assertJson([
                'data'=> [],
                'statusCode' => 200
            ]);
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
}
