<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    
    protected $fillable = ['title', 'content', 'slug', 'visits_count'];

    
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    
    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }
}