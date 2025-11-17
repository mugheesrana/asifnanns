<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'slug', 'category_ids', 'excerpt', 'content',
        'featured_image', 'seo_id', 'user_id', 'status', 'published_at'
    ];

    protected $casts = [
        'category_ids' => 'array', // Laravel will auto-cast to array/JSON
    ];
     // Force store as integers
    public function setCategoryIdsAttribute($value)
    {
        $this->attributes['category_ids'] = json_encode(array_map('intval', (array) $value));
    }

    public function seo()
    {
        return $this->belongsTo(Seo::class);
    }

    public function categories()
    {
        return Category::whereIn('id', $this->category_ids ?? [])->get();
    }
}
