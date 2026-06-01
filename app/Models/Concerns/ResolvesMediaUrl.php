<?php

namespace App\Models\Concerns;

trait ResolvesMediaUrl
{
    /**
     * Résout un chemin média stocké en URL publique.
     *
     * Délègue au helper global image_url() : les chemins commençant par
     * "img/" sont servis depuis /public (assets historiques), les autres
     * passent par le disque de stockage configuré (uploads du back-office).
     */
    protected function resolveMediaUrl(?string $path): ?string
    {
        return $path ? image_url($path) : null;
    }
}
