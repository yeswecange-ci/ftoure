<?php

namespace App\Models\Concerns;

/**
 * Expose la galerie d'images d'un élément de contenu.
 *
 * Le champ `gallery` est un tableau de chemins média (upload multiple du
 * back-office). L'accesseur `gallery_urls` résout chaque chemin en URL
 * publique via le helper image_url().
 */
trait HasGallery
{
    /** @return array<int, string> */
    public function getGalleryUrlsAttribute(): array
    {
        return collect($this->gallery ?? [])
            ->map(fn ($path) => image_url($path))
            ->filter()
            ->values()
            ->all();
    }
}
