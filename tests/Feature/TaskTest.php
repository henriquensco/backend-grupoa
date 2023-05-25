<?php

namespace Tests\Feature;

use Tests\TestCase;

class TaskTest extends TestCase
{
    private $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0Ojg5ODkvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODUwMjYxODQsImV4cCI6MTY4NTAzMzM4NCwibmJmIjoxNjg1MDI2MTg0LCJqdGkiOiJGTVNHRTdkNVk5N3IxOW96Iiwic3ViIjoiOTkzZjQ5ZDAtM2E5Yi00NmRkLTg4MGYtMjM1MDNhY2RlYjlhIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.Rb4GOr-MzElQIwcwoqgER7762QccGaPhMkRE4pRq0Ro';

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
        $uuid = '9940afdf-c585-468b-b7ba-a660224a1afe';

        $body = [
            'title' => '123',
            'description' => 'teste'
        ];

        $response = $this->response('PUT', '/api/tasks/update/'.$uuid, $body);

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
