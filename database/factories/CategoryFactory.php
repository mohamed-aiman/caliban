<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'mtime' => null,
            'images' => null,
            'parent_id' => null,
            'level' => null,
            'category' => null,
            'category_name' => $this->faker->name,
            'sub_category_name' => $this->faker->name,
            'third_level_category_name' => $this->faker->name,
            'fourth_level_category_name' => $this->faker->name,
            'fifth_level_category_name' => $this->faker->name,
            'sub_category' => null,
            'third_level_category' => null,
            'fourth_level_category' => null,
            'fifth_level_category' => null,
        ];
    }
}
