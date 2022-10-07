<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @group products
     */
    public function test_can_see_product_list()
    {

        $products = Product::factory(20)->create();

        $response = $this->get('/products');

        $response->assertStatus(200);

        foreach ($products as $product) {
            $response->assertSee($product->title);
        }
    }

    /**
     * @group products
     */
    public function test_can_see_product()
    {

        $product = Product::factory()->create();

        $response = $this->get('/products/' . $product->slug);

        $response->assertSee($product->title);
        $response->assertSee($product->description);
        $response->assertStatus(200);
    }

    /**
     * @group products
     */
    public function test_product_slug_works_fine_when_title_is_same()
    {

        $product = Product::factory()->create([
            'title' => 'My Product',
        ]);
        
        $product2 = Product::factory()->create([
            'title' => 'My Product',
        ]);
        
        $this->assertNotEquals($product->slug, $product2->slug);
        $this->assertNotNull($product->slug);
        $this->assertNotNull($product2->slug);
    }
}
