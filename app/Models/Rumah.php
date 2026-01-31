<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $fillable = [
        'blok',
        'nomor',
        'status',
        'penghuni',
        'no_telp',
        'email',
        'jumlah_penghuni',
        'keterangan'
    ];

    protected $casts = [
        'status' => 'string',
    ];

    protected $attributes = [
        'jumlah_penghuni' => 0,
    ];
    
    // Clear cache when rumah changes
    public static function boot()
    {
        parent::boot();
        
        static::saved(function () {
            \Cache::forget('home.stats');
        });
        
        static::deleted(function () {
            \Cache::forget('home.stats');
        });
    }

    // Relationship with Denah
    public function denah()
    {
        return $this->belongsTo(Denah::class, 'blok', 'blok');
    }
}
