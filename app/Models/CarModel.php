<?php
namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = ['brand_id', 'title'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function versions()
    {
        return $this->hasMany(CarVersion::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
     // Auto-generate slug when creating/updating
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }
}
