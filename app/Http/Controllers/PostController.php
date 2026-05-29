<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        $post->increment('visits_count');

        $visited = Session::get('visited_posts', []);

        if (!in_array($id, $visited)) {
            Visit::create([
                'post_id' => $post->id,
                'ip_address' => request()->ip(),
                'browser' => request()->header('User-Agent')
            ]);
            
            $visited[] = $id;
            Session::put('visited_posts', $visited);
        }

        return view('posts.show', compact('post'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $posts = Post::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($posts);
    }
}