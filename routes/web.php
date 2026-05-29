<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;

Route::get('/', [PostController::class, 'index']);

Route::get('/post/{id}', [PostController::class, 'show']);

Route::get('/search-posts', [PostController::class, 'search']);

Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::post('/post/{id}/comment', [CommentController::class, 'store']);