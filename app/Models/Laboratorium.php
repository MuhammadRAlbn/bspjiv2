<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Laboratorium extends Model
{
    protected $table = 'laboratorium';
    
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function ruangLingkup(): HasMany
    {
        return $this->hasMany(RuangLingkup::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}