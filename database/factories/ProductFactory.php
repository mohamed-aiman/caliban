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
        $conditions = ['new', 'used_like_new', 'used', 'refurbished', 'damaged'];
        $selling_formats = ['buy_now', 'classified'];
        $taxes = ['','GST_6%'];

        return [
            // 'slug' => $this->faker->slug,
            'title' => $this->faker->name,
            'description' => $this->faker->randomHtml(2,2),
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
            'condition' => $this->faker->randomElement($conditions),
            'selling_format' => $this->faker->randomElement($selling_formats),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'tax' => $this->faker->randomElement($taxes),
            'quantity' => $this->faker->randomNumber(2),
        ];
    }
}
