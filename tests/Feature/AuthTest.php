<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{
    // Change to login credentials
    public string $email = 'zabbott@example.net';
    public string $password = 'password';

    public function setUp(): void
    {
        parent::setUp();

        $this->login();
    }

    protected function login() 
    {
        return $this->json('POST', '/api/auth/login', [
            'email' => $this->email,
            'password' => $this->password
        ]);
    }

    public function test_login(): void
    {
        $response = $this->login();

        $response->assertStatus(200)
            ->assertJson([
                'access_token' => $response['access_token'],
                'token_type' => 'bearer',
                'expires_in' => '2 Hours'
            ]);

        $this->token = $response['access_token'];

        $this->assertEquals($this->token, $response['access_token']);
        $this->assertEquals('bearer', $response['token_type']);
    }
}