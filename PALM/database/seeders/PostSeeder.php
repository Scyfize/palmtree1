<?php

namespace Database\Seeders;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Post::insert([
            [
                'user_id' => 1,
                'title' => 'First Post',
                'body' => 'This is the body of the first post. Lorem ipsum dolor sit amet.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'title' => 'Second Post',
                'body' => 'This is the body of the second post. Aenean commodo ligula eget dolor.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'title' => 'Third Post',
                'body' => 'This is the body of the third post. Curabitur ullamcorper ultricies nisi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'title' => 'Fourth Post',
                'body' => 'This is the body of the fourth post. Lorem ipsum dolor sit amet.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'title' => 'Fifth Post',
                'body' => 'This is the body of the fifth post. Aenean commodo ligula eget dolor.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'title' => 'Sixth Post',
                'body' => 'This is the body of the sixth post. Curabitur ullamcorper ultricies nisi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
