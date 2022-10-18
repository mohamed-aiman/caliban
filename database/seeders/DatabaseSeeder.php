<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            IslandSeeder::class,
            LocationSeeder::class,
            PhotoSeeder::class,
            //depends on multiple other seeders
            ProductSeeder::class,
        ]);
    }
}
