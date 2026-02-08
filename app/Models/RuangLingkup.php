<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RuangLingkup extends Model
{
    protected $table = 'ruang_lingkup';
    
    protected $fillable = [
        'laboratorium_id',
        'komoditi',
        'parameter_uji',
        'metode_uji',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}