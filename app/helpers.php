<?php

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('site_settings')) {
    /**
     * Réglages globaux du site (ligne unique), mémoïsés pour la requête.
     *
     * La mémoïsation est portée par le conteneur (instance "scoped") afin
     * d'être réinitialisée à chaque requête et de rester testable.
     */
    function site_settings(): SiteSetting
    {
        if (! app()->resolved('site.settings')) {
            app()->scoped('site.settings', fn () => SiteSetting::current());
        }

        return app('site.settings');
    }
}

if (! function_exists('image_url')) {
    /**
     * Resolve a stored image path to a public URL.
     * Paths starting with "img/" are served directly from /public.
     * All other paths are served via Laravel Storage (disk).
     */
    function image_url(?string $path): string
    {
        if (! $path) {
            return '';
        }

        return Str::startsWith($path, 'img/')
            ? asset($path)
            : Storage::url($path);
    }
}
