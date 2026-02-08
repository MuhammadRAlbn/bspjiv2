<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Komoditi extends Model
{
    protected $table = 'komoditi';
    
    protected $fillable = [
        'nama',
        'slug',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function tarif(): HasMany
    {
        return $this->hasMany(Tarif::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}