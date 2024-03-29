<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }


    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }


    public function brandModel(): BelongsTo
    {
        return $this->belongsTo(BrandModel::class);
    }


    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }


    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }
}
