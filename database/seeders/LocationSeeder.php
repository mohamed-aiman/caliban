<?php

namespace Database\Seeders;

use App\Models\Island;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $islands = Island::all();

        foreach ($islands as $island) {
            Location::create([
                'name' => $island->full_name,
                'type' => 'island',
                'island_id' => $island->id,
            ]);
        }
    }
}
