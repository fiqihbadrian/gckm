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

    // Relationship with Denah
    public function denah()
    {
        return $this->belongsTo(Denah::class, 'blok', 'blok');
    }
}
