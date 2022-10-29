<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreSeeder extends Seeder
{

    public function run()
    {
        $this->faker = \Faker\Factory::create();

        $stores = User::all()->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            Store::factory()->create([
                'owner_id' => $this->faker->randomElement($stores),
            ]);
        }
    }


}
