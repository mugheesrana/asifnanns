<?php 
// app/Models/ServiceCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceCategory extends Model
{
    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
        'status',
        'sort_order',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    /** Parent category (null if this is a root category) */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /** Direct children (subcategories) */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /** All services directly under this category (usually subcategories) */
    public function services()
    {
        return $this->hasMany(Service::class, 'service_category_id');
    }

    /** Scope: only root categories */
    public function scopeRoots($query)
    {
        return $query->whereNull('parent_id');
    }

    /** Scope: only active */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
