<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];


    // join table ke post
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
