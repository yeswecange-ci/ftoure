<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

/**
 * Génère automatiquement un slug unique (au sein de la table) à partir du
 * titre lorsqu'aucun slug n'est fourni. Le slug reste éditable au back-office.
 */
trait GeneratesSlug
{
    public static function bootGeneratesSlug(): void
    {
        static::saving(function ($model) {
            if (blank($model->slug)) {
                $model->slug = $model->generateUniqueSlug($model->title);
            }
        });
    }

    protected function generateUniqueSlug(?string $source): string
    {
        $base = Str::slug($source ?: 'item') ?: 'item';
        $slug = $base;
        $i = 1;

        while (
            static::query()
                ->where('slug', $slug)
                ->when($this->exists, fn ($q) => $q->whereKeyNot($this->getKey()))
                ->exists()
        ) {
            $slug = $base.'-'.(++$i);
        }

        return $slug;
    }
}
