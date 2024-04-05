<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
