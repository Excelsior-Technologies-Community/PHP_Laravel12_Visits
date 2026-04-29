<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);

Route::get('/post/{id}', [PostController::class, 'show']);

Route::get('/search-posts', [PostController::class, 'search']);