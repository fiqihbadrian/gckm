<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denah extends Model
{
    protected $fillable = [
        'blok',
        'name',
        'description',
        'image',
        'total_units',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'total_units' => 'integer',
    ];

    // Scope for active blocks
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Relationship with Rumah
    public function rumahs()
    {
        return $this->hasMany(Rumah::class, 'blok', 'blok');
    }
}
