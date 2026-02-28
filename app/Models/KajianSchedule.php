<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KajianSchedule extends Model
{
    protected $fillable = [
        'day',
        'title',
        'ustaz',
        'date',
        'time',
        'platform',
        'platform_link',
        'description',
        'status',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', 'upcoming')->where('date', '>=', now());
    }
}
