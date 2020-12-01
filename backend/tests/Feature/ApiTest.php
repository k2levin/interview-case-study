<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    // route = api.home.status.get
    public function testStatus()
    {
        $response = $this->get('api/status');

        $response->assertStatus(200);
        $response->assertJson(['status' => 'Available']);
    }
}
