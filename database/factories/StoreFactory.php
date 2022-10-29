<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'slug' => $this->faker->slug,
            'owner_id' => function() {
                return \App\Models\User::factory()->create()->id;
            },
            'avatar_url' => 'https://i.pravatar.cc/150?img=' . $this->faker->numberBetween(1, 20),
            'phone' => $this->faker->phoneNumber,
            'phone_2' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'website' => $this->faker->url,
        ];
    }
}
