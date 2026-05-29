<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
   
    protected $fillable = ['post_id', 'ip_address', 'browser'];

    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}