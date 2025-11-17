<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug', 'description'];

    public function getBlogsCountAttribute()
    {
        return Blog::whereJsonContains('category_ids', $this->id)->count();
    }
}
