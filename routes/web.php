<?php

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
