<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function brandModels(): HasMany
    {
        return $this->hasMany(BrandModel::class)
            ->orderBy('name');
    }


    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
