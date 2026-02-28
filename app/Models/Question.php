<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'name',
        'email_or_whatsapp',
        'question',
        'answer',
        'is_answered',
        'is_published',
        'answered_at',
    ];

    protected $casts = [
        'is_answered' => 'boolean',
        'is_published' => 'boolean',
        'answered_at' => 'datetime',
    ];

    public function scopeAnswered($query)
    {
        return $query->where('is_answered', true);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
