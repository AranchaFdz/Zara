<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BrandTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_homepage_does_not_exist()
    {
        $response = $this->get('/brand');

        $response->assertStatus(404);
    }
}
