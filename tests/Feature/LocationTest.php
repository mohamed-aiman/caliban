<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @group locations
     */
    public function test_can_view_locations()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/locations/for-select');

        $response->assertStatus(200);
    }
}
