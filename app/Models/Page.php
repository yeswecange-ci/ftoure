<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'header_image',
        'bio_title',
        'bio_content',
        'bio_image_1',
        'bio_image_2',
        'bio_image_3',
        'booking_description',
        'booking_phone',
        'booking_email',
    ];

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }

    public function teasers()
    {
        return $this->hasMany(Teaser::class);
    }

    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class);
    }

    public function getHeaderImageUrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->header_image);
    }

    public function getBioImage1UrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->bio_image_1);
    }

    public function getBioImage2UrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->bio_image_2);
    }

    public function getBioImage3UrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->bio_image_3);
    }

    protected function resolveMediaUrl(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        return Str::startsWith($path, 'img/')
            ? asset($path)
            : Storage::url($path);
    }
}
