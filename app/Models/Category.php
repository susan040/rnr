<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $appends = ['image_url'];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function getImageUrlAttribute()
    {
        return asset($this->image);
    }
}
