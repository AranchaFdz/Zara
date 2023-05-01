<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SalesTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_does_not_exist()
    {
        $response = $this->get('/sales');

        $response->assertStatus(404);
    }

    public function test_sales_table()
    {
        $brand = \App\Models\Brand::create(['name' => 'zara']);

        $product = \App\Models\Products::create([
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => 100.00,
            'brand_id' => $brand->id,
            'currency' => 'Euro',
        ]);

        $salesData = [
            'start_date' => '2023-04-26 00:00:00',
            'end_date' => '2023-04-26 10:00:00',
            'price_list' => 1,
            'brand_id' => $brand->id,
            'product_id' => $product->id,
            'priority' => 0,
            'currency' => 'Euro',
            'price'=> 50.00,
        ];
    
        \App\Models\Sales::create($salesData);
    
        $response = $this->get('/sales');
    
        $response->assertStatus(200)
                 ->assertJson([$salesData]);
    }
}
