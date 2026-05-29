<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            ['title' => 'Laravel 12 Tips', 'content' => 'Laravel 12 ma navu ghunu che, jo ke optimization.', 'visits_count' => 150],
            ['title' => 'Advanced Analytics', 'content' => 'Analytics thi tame user behaviour track kari shako.', 'visits_count' => 200],
            ['title' => 'User Interaction', 'content' => 'Comments ane Likes thi user connection vadhe che.', 'visits_count' => 50],
            ['title' => 'Why PHP 8.4?', 'content' => 'PHP 8.4 fast che ane code ne clean rakhe che.', 'visits_count' => 300],
            ['title' => 'Best Coding Practices', 'content' => 'Clean code write karva mate aa tips follow karo.', 'visits_count' => 120],
            ['title' => 'Database Optimization', 'content' => 'Index no use karvathi query fast thashe.', 'visits_count' => 85],
            ['title' => 'API Development', 'content' => 'Laravel 12 ma API banavvi ekdam saral che.', 'visits_count' => 450],
            ['title' => 'Frontend with Blade', 'content' => 'Blade templates thi UI design karvu fast che.', 'visits_count' => 95],
            ['title' => 'Security in Laravel', 'content' => 'SQL injection thi bachva mate Query Builder vapro.', 'visits_count' => 210],
            ['title' => 'Testing in Laravel', 'content' => 'PHPUnit thi code test karvo jaruri che.', 'visits_count' => 60],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}