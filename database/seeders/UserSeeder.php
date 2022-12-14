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
                'contact_no' => '9999121',
                'username' => 'MisterAdmin',
                'password' => bcrypt('password'),
                'avatar_url' => 'https://i.pravatar.cc/150?img=1',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@localhost',
                'contact_no' => '9999122',
                'username' => 'Aneh Admin',
                'password' => bcrypt('password'),
                'avatar_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            ],
            [
                'name' => 'User',
                'email' => 'user@localhost',
                'contact_no' => '9999123',
                'username' => 'user',
                'password' => bcrypt('password'),
                'avatar_url' => 'https://i.pravatar.cc/150?img=2',
                
            ],
            [
                'name' => 'Test Seller User',
                'email' => 'seller@localhost',
                'contact_no' => '9999124',
                'username' => 'seller',
                'password' => bcrypt('password'),
                'avatar_url' => 'https://i.pravatar.cc/150?img=3',
                
            ],
            [
                'name' => 'Test Non Seller User',
                'email' => 'non_seller@localhost',
                'contact_no' => '9999125',
                'username' => 'non_seller',
                'password' => bcrypt('password'),
                'avatar_url' => 'https://i.pravatar.cc/150?img=4',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }


}
