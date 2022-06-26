<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConexionTest extends TestCase
{
    public function test_conexion()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
