<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BrandModel extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function brand(): BelongsTo
    {
        return $this->belongsTo(BrandModel::class);
    }


    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
