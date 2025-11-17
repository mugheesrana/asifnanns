<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarVersion extends Model
{
    protected $fillable = ['model_id', 'title', 'slug', 'meta'];

    protected $casts = [
        'meta' => 'array', // so JSON is handled automatically
    ];

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
