<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    protected $guarded = ['id'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
