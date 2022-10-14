<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryPathSeeder extends Seeder
{

    public function run()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            $category->path = $category->path();
            $category->save();
        }

    }


}
