<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{

    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'a@g.com',
                'username' => 'MisterAdmin',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@localhost',
                'username' => 'Aneh Admin',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@localhost',
                'username' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Test Seller User',
                'email' => 'seller@localhost',
                'username' => 'seller',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Test Non Seller User',
                'email' => 'non_seller@localhost',
                'username' => 'non_seller',
                'password' => bcrypt('password'),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }


}
