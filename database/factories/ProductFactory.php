<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'slug' => $this->faker->slug,
            'title' => $this->faker->name,
            'description' => $this->faker->text,
            // 'price' => $this->faker->randomFloat(2, 1, 1000),
            // 'category_id' => function () {
            //     return Category::factory()->create()->id;
            // },
        ];
    }
}
