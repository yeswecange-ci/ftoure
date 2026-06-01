<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Derrière un proxy HTTPS, force la génération d'URLs en https
        // (assets, images, liens) pour éviter le contenu mixte bloqué.
        if (Str::startsWith((string) config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }

        // Partage la liste des univers publiés et les réglages du site
        // aux vues qui en ont besoin (accueil, layout, partials).
        View::composer(['welcome', 'layouts.page', 'partials.social'], function ($view) {
            $view->with([
                'universes' => Page::query()->published()->get(),
                'settings' => site_settings(),
            ]);
        });
    }
}
