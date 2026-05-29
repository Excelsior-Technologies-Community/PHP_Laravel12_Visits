<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Visit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        
        $totalVisits = Visit::count();
        
        $popularPosts = Post::orderBy('visits_count', 'desc')
                            ->take(5)
                            ->get();
        
        return view('admin.dashboard', compact('totalPosts', 'totalVisits', 'popularPosts'));
    }
}