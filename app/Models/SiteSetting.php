<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use ResolvesMediaUrl;

    protected $fillable = [
        'home_title',
        'home_subtitle',
        'booking_phone',
        'booking_email',
        'social_title',
        'gallery_images',
    ];

    protected $casts = [
        'gallery_images' => 'array',
    ];

    /**
     * Retourne l'unique ligne de réglages, en la créant si nécessaire.
     */
    public static function current(): self
    {
        return static::firstOrCreate([]);
    }

    /**
     * URLs publiques résolues des images de la galerie « réseaux sociaux ».
     *
     * @return array<int, string>
     */
    public function getGalleryUrlsAttribute(): array
    {
        return collect($this->gallery_images ?? [])
            ->map(fn (string $path) => $this->resolveMediaUrl($path))
            ->filter()
            ->values()
            ->all();
    }
}
