<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListingEditTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @group products
     * @group listing
     */
    public function test_seller_can_see_listing_product_form_data()
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

        $product = Product::factory()->create([
            'seller_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $product->photos()->attach($photo1->id);
        // $product->photos()->attach($photo2->id);
        $product->photos()->attach($photo3->id);

        $product->locations()->attach($location1->id);
        // $product->locations()->attach($location2->id);
        $product->locations()->attach($location3->id);

        $response = $this->post('/listings/' . $product->slug . '/form-data');

        
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'form' => [
                'title',
                'description',
                'category_id',
                'condition',
                'selling_format',
                'duration',
                'price',
                'tax',
                'quantity',
                'photos',
                'locations',
            ]
        ]);

        $response->assertJson([
            'form' => [
                'title' => $product->title,
                'description' => $product->description,
                'category_id' => $product->category_id,
                'condition' => $product->condition,
                'selling_format' => $product->selling_format,
                'duration' => $product->duration,
                'price' => $product->price,
                'tax' => $product->tax,
                'quantity' => $product->quantity,
                'photos' => [
                    $photo1->id,
                    $photo3->id,
                ],
                'locations' => [
                    $location1->id,
                    $location3->id,
                ],
            ]
        ]);
    }
}
