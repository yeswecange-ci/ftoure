<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
