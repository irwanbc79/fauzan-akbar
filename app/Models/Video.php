<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Video extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'youtube_url',
        'youtube_id',
        'thumbnail',
        'category',
        'duration_minutes',
        'views',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Video $video) {
            if (empty($video->slug)) {
                $video->slug = Str::slug($video->title);
            }
            if (empty($video->youtube_id) && $video->youtube_url) {
                $video->youtube_id = self::extractYoutubeId($video->youtube_url);
            }
            if (empty($video->thumbnail) && $video->youtube_id) {
                $video->thumbnail = "https://img.youtube.com/vi/{$video->youtube_id}/maxresdefault.jpg";
            }
        });
    }

    public static function extractYoutubeId(string $url): ?string
    {
        preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches);
        return $matches[1] ?? null;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getEmbedUrlAttribute(): string
    {
        return "https://www.youtube.com/embed/{$this->youtube_id}";
    }
}
