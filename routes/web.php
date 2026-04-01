<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Actrice', function () {
    return view('actrice');
})->name('actrice');

Route::get('/Présentatrice', function () {
    return view('presentatrice');
})->name('presentatrice');

Route::get('/Modèle', function () {
    return view('modele');
})->name('modele');

Route::get('/Entrepeneur-immobilier', function () {
    return view('entrepreneur');
})->name('entrepreneur');
