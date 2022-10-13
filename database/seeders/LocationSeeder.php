<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parents = Location::factory()->count(5)->create();

        foreach ($parents as $location) {
            //random number of children for each
            $children = Location::factory()->count(rand(1, 4))->create([
                'parent_id' => $location->id
            ]);
        }
    }
}
