<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        // Set default visits to 0
        foreach ($posts as $post) {
            $post->totalVisits = 1;
            $post->uniqueVisits = 1;
        }

        return view('posts.index', compact('posts'));
    }
}