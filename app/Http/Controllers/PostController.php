<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    // 📌 Show all posts
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // 📌 Show single post + track visits
    public function show($id)
    {
        $post = Post::findOrFail($id);

        // 🔥 Increase total visits every time
        $post->increment('total_visits');

        // 🔥 Unique visit tracking (session)
        $visited = Session::get('visited_posts', []);

        if (!in_array($id, $visited)) {
            $post->increment('unique_visits');
            $visited[] = $id;
            Session::put('visited_posts', $visited);
        }

        return view('posts.show', compact('post'));
    }

    // 📌 AJAX Search
    public function search(Request $request)
    {
        $query = $request->get('query');

        $posts = Post::where('title', 'LIKE', "%{$query}%")
            ->orWhere('body', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($posts);
    }
}