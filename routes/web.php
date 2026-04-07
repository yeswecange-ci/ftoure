<?php

use Illuminate\Support\Facades\Route;

use App\Models\Page;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Actrice', function () {
    $page = Page::with(['works', 'news', 'agendas', 'teasers', 'socialLinks'])->where('slug', 'actrice')->firstOrFail();
    return view('actrice', compact('page'));
})->name('actrice');

/* Route::get('/Présentatrice', function () {
    $page = Page::with(['works', 'news', 'agendas', 'teasers', 'socialLinks'])->where('slug', 'presentatrice')->first();
    if (! $page) {
        $page = new Page([
            'slug' => 'presentatrice',
            'title' => 'BIENVENUE SUR LE SITE DE',
            'subtitle' => 'FAT TOURÉ',
            'header_image' => 'img/presentatrice.png',
            'bio_title' => 'LOREM IPSUM DOLOR SIT AMET...',
            'bio_content' => 'Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo.',
            'bio_image_1' => 'img/imagebio1.jpg',
            'bio_image_2' => 'img/imagebio2.jpg',
            'bio_image_3' => 'img/imagebio3.jpg',
            'booking_description' => 'Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo.',
            'booking_phone' => '+33 X XXX XXX XX / +225 X XXX XXX XX',
            'booking_email' => 'EMAILFATTOURÉ@BOOKING.COM',
        ]);
        $page->setRelation('works', collect());
        $page->setRelation('news', collect());
        $page->setRelation('agendas', collect());
        $page->setRelation('teasers', collect());
        $page->setRelation('socialLinks', collect());
    }

    return view('presentatrice', compact('page'));
})->name('presentatrice'); */
Route::get('/Présentatrice', function () {
    $page = Page::with(['works', 'news', 'agendas', 'teasers', 'socialLinks'])->where('slug', 'presentatrice')->firstOrFail();
    return view('presentatrice', compact('page'));
})->name('presentatrice');

Route::get('/Modèle', function () {
    $page = Page::with(['works', 'news', 'agendas', 'teasers', 'socialLinks'])->where('slug', 'modele')->firstOrFail();
    return view('modele', compact('page'));
})->name('modele');

Route::get('/Entrepreneur-immobilier', function () {
    $page = Page::with(['works', 'news', 'agendas', 'teasers', 'socialLinks'])->where('slug', 'entrepreneur')->firstOrFail();
    return view('entrepreneur', compact('page'));
})->name('entrepreneur');
