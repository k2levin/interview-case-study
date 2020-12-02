<?php

namespace Tests\Feature\V1_0;

use Tests\TestCase;

class AuthTest extends TestCase
{
    private $name = 'John Doe';
    private $email = 'john.doe@email.com';
    private $password = 'Secret';

    // route = api.v1.0.guest.register
    public function testRegister()
    {
        $this->migrateFresh();

        $params = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];

        $response = $this->json('POST', 'api/v1.0/register', $params);
        $response->assertStatus(200);
        $response->assertJson(['message' => 'Success']);

        $this->assertDatabaseHas('users', [
            'email' => $this->email,
        ]);
    }

    public function testAuth()
    {
        $access_token = 'eyJ0eXAiOiJKV1QiLC';

        // Cannot see profile before login
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$access_token,
        ])->json('GET', 'api/v1.0/user/profile');
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Unauthorized']);

        // Login
        $params = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        $response = $this->json('POST', 'api/v1.0/login', $params);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in',
        ]);
        $access_token = $response->getData()->access_token;

        // Can see profile after login
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$access_token,
        ])->json('GET', 'api/v1.0/user/profile');
        $response->assertStatus(200);
        $response->assertJson([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        // Logout
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$access_token,
        ])->json('POST', 'api/v1.0/logout');
        $response->assertStatus(200);
        $response->assertJson(['message' => 'Success']);

        // Cannot see profile after logout
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$access_token,
        ])->json('GET', 'api/v1.0/user/profile');
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Unauthorized']);
    }
}
