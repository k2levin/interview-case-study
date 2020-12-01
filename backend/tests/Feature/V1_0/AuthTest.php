<?php

namespace Tests\Feature\V1_0;

use Tests\TestCase;

class AuthTest extends TestCase
{
    private $name = 'John Doe';
    private $email = 'john.doe@email.com';
    private $password = 'Secret';
    private static $access_token = '';

    // route = api.v1.0.guest.register
    public function testGuestRegister()
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

    // route = api.v1.0.guest.login
    public function testGuestLogin()
    {
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

        self::$access_token = $response->getData()->access_token;
    }

    // route = api.v1.0.user.profile.get
    public function testUserProfile()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.self::$access_token,
        ])->json('GET', 'api/v1.0/user/profile');
        $response->assertStatus(200);
        $response->assertJson([
            'name' => $this->name,
            'email' => $this->email,
        ]);
    }

    // route = api.v1.0.user.logout
    public function testUserLogout()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.self::$access_token,
        ])->json('POST', 'api/v1.0/logout');
        $response->assertStatus(200);
        $response->assertJson(['message' => 'Success']);
    }

    // route = api.v1.0.user.verify
    // api/v1.0/user/verify
}
