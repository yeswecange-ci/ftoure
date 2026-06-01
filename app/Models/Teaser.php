<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Teaser extends Model
{
    protected $fillable = [
        'page_id',
        'title',
        'poster_image',
        'video_url',
        'video_file',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getPosterImageUrlAttribute(): ?string
    {
        if (! $this->poster_image) {
            return null;
        }

        return Str::startsWith($this->poster_image, 'img/')
            ? asset($this->poster_image)
            : Storage::url($this->poster_image);
    }

    public function getVideoFileUrlAttribute(): ?string
    {
        if (! $this->video_file) {
            return null;
        }

        return Storage::disk('public')->url($this->video_file);
    }
}
