<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'First Post',
            'body' => 'This is the first post body.'
        ]);

        Post::create([
            'title' => 'Second Post',
            'body' => 'This is the second post body.'
        ]);
    }
}