<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function brandModels()
    {
        return $this->hasMany(BrandModel::class)
            ->orderBy('name');
    }


    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
