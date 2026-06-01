<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/Actrice', [PageController::class, 'show'])
    ->defaults('slug', 'actrice')
    ->name('actrice');

Route::get('/Présentatrice', [PageController::class, 'show'])
    ->defaults('slug', 'presentatrice')
    ->name('presentatrice');

Route::get('/Modèle', [PageController::class, 'show'])
    ->defaults('slug', 'modele')
    ->name('modele');

Route::get('/Entrepreneur-immobilier', [PageController::class, 'show'])
    ->defaults('slug', 'entrepreneur')
    ->name('entrepreneur');
