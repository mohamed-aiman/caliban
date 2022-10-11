<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'file_name' => $this->faker->unique()->numberBetween(1, 1000) . '160043_1665508452.png',
            'url' => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop/160043_1665508452.png",
            'medium_url' => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop/large/160043_1665508452.png",
            'medium_url' => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop/medium/160043_1665508452.png",
            'thumbnail_url' => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop/thumbnail/160043_1665508452.png",
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
