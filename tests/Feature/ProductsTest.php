<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_homepage_does_not_exist()
    {
        $response = $this->get('/products');

        $response->assertStatus(404);
    }
}
