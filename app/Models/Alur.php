<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alur extends Model
{
    protected $table = 'alur';
    
    protected $fillable = [
        'judul',
        'gambar',
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
}