<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
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
                [
                    'key' => '1',
                    'photo_id' => $photo1->id,
                ],
                [
                    'key' => '3',
                    'photo_id' => $photo3->id,
                ],
            ],
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('products', [
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
    }
}
