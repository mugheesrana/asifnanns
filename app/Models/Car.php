<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [

    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function version()
    {
        return $this->belongsTo(CarVersion::class, 'version_id');
    }

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Get primary image
    public function primaryImage()
    {
        return $this->images()->where('is_primary', true)->first();
    }

    // Get primary image URL
    public function getPrimaryImageUrlAttribute()
    {
        $primaryImage = $this->primaryImage();
        if ($primaryImage && $primaryImage->image) {
            return asset($primaryImage->image);
        }
        return asset('user/assets/images/car-list/default-car.jpg'); // Default car image
    }
}
