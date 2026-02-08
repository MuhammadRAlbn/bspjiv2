<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikasi extends Model
{
    protected $table = 'sertifikasi';
    
    protected $fillable = [
        'judul',
        'gambar',
        'lampiran',
        'deskripsi',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getGambarUrlAttribute(): string
    {
        return asset('storage/' . $this->gambar);
    }

    public function getLampiranUrlAttribute(): ?string
    {
        return $this->lampiran ? asset('storage/' . $this->lampiran) : null;
    }
}