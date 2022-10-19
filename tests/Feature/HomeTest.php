<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @group products
     */
    public function test_can_see_home_page()
    {
        $products = Product::factory(20)->create();

        $response = $this->get('/');

        $response->assertStatus(200);

        foreach ($products as $product) {
            $response->assertSee($product->title);
        }
    }
}
