<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebTest extends TestCase
{
    // route = home.index.get
    public function testHome()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirect('http://localhost/docs/index.html');
    }
}
