<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
