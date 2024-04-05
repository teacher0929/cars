<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function location()
    {
        return $this->belongsTo(Location::class);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function brandModel()
    {
        return $this->belongsTo(BrandModel::class);
    }


    public function color()
    {
        return $this->belongsTo(Color::class);
    }


    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}
