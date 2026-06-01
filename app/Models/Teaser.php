<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Teaser extends Model
{
    use ResolvesMediaUrl;

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
        return $this->resolveMediaUrl($this->poster_image);
    }

    public function getVideoFileUrlAttribute(): ?string
    {
        return $this->video_file
            ? Storage::disk('public')->url($this->video_file)
            : null;
    }
}
