<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['title','slug','image'];

    public function models()
    {
        return $this->hasMany(CarModel::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('uploads/brands/' . $this->image);
        }
        return asset('uploads/brands/default.svg');
    }
}
