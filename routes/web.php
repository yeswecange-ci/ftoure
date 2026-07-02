<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/actrice', [PageController::class, 'show'])
    ->defaults('slug', 'actrice')
    ->name('actrice');

Route::get('/presentatrice', [PageController::class, 'show'])
    ->defaults('slug', 'presentatrice')
    ->name('presentatrice');

Route::get('/modele', [PageController::class, 'show'])
    ->defaults('slug', 'modele')
    ->name('modele');

Route::get('/entrepreneur', [PageController::class, 'show'])
    ->defaults('slug', 'entrepreneur')
    ->name('entrepreneur');

/*
 * Pages de détail (slug + galerie d'images) des éléments de contenu,
 * scopées par univers. Le paramètre {universe} correspond au slug de la page.
 */
Route::get('/{universe}/realisations/{slug}', [DetailController::class, 'work'])->name('work.show');
Route::get('/{universe}/distinctions/{slug}', [DetailController::class, 'distinction'])->name('distinction.show');
Route::get('/{universe}/shootings/{slug}', [DetailController::class, 'shooting'])->name('shooting.show');
Route::get('/{universe}/actualites/{slug}', [DetailController::class, 'news'])->name('news.show');
