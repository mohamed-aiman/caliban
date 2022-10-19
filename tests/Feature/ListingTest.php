<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @group products
     * @group listing
     */
    public function test_can_create_product()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();

        $photo1 = Photo::factory()->create([ 'user_id' => $user->id ]);
        $photo2 = Photo::factory()->create([ 'user_id' => $user->id ]);
        $photo3 = Photo::factory()->create([ 'user_id' => $user->id ]);
        $photo4 = Photo::factory()->create([ 'user_id' => $user->id ]);

        $location1 = Location::factory()->create();
        $location2 = Location::factory()->create();
        $location3 = Location::factory()->create();

        $response = $this->post('/listings', [
            'title' => 'My Product',
            'description' => 'My Product Description',
            'category_id' => $category->id,
            'condition' => 'new',
            'selling_format' => 'buy_now',
            'duration' => 30,
            'price' => 100,
            'tax' => 0,
            'quantity' => 1,
            'photos' => [
                $photo1->id,
                $photo3->id,
            ],
            'locations' => [
                $location1->id,
                $location3->id,
            ],
        ]);

        $response->assertStatus(201);
        
        $product = $response->json()['product'];
        $productId = $product['id'];

        $this->assertDatabaseHas('products', [
            'id' => $productId,
            'title' => 'My Product',
            'description' => 'My Product Description',
            'category_id' => 1,
            'condition' => 'new',
            'selling_format' => 'buy_now',
            'list_till' => now()->addDays(30),
            'price' => 100,
            'tax' => 0,
            'quantity' => 1,
            'seller_id' => $user->id,
        ]);

        $this->assertDatabaseHas('product_photo', [
            'product_id' => $productId,
            'photo_id' => $photo1->id,
        ]);

        $this->assertDatabaseHas('product_photo', [
            'product_id' => $productId,
            'photo_id' => $photo3->id,
        ]);

        $this->assertDatabaseHas('product_location', [
            'product_id' => $productId,
            'location_id' => $location1->id,
        ]);

        $this->assertDatabaseHas('product_location', [
            'product_id' => $productId,
            'location_id' => $location3->id,
        ]);

        $this->assertDatabaseMissing('product_photo', [
            'product_id' => $productId,
            'photo_id' => $photo2->id,
        ]);

        $this->assertDatabaseMissing('product_location', [
            'product_id' => $productId,
            'location_id' => $location2->id,
        ]);
    }
}
