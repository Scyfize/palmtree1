<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::insert([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('user1'),
            'username' => 'User 1'
        ]);
        User::insert([
            'name' => 'User 2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('user2'),
            'username' => 'User 2'
        ]);
        User::insert([
            'name' => 'User 3',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('user3'),
            'username' => 'User 3'
        ]);
        User::insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'username' => 'admin'
        ]);
        $this->call(ArticleSeeder::class);
        $this->call(PostSeeder::class);

    }
}
