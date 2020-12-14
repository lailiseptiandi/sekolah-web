<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // join ke table tags many
    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    // change default date view
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y');
    }
}
