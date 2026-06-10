<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Idempotent : utilise firstOrCreate (clé = slug) et ne crée les
     * enregistrements liés que lorsque la page vient d'être créée
     * (wasRecentlyCreated). Un redéploiement ne plante plus, ne duplique
     * pas les sous-éléments et n'écrase pas les contenus déjà modifiés.
     */
    public function run(): void
    {
        $actrice = \App\Models\Page::firstOrCreate([
            'slug' => 'actrice',
        ], [
            'name' => 'Actrice',
            'sort_order' => 1,
            'is_published' => true,
            'card_image' => 'img/actrice.png',
            'title' => 'BIENVENUE SUR LE SITE DE',
            'subtitle' => 'FAT TOURÉ',
            'header_image' => 'img/accueil-actrice.jpg',
            'bio_title' => 'LOREM IPSUM DOLOR SIT AMET...',
            'bio_content' => 'Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum. Et bibendum tortor mauris et. Pretium risus vitae amet interdum quisque. Fermentum pellentesque sagittis consequat pellentesque in purus lorem ac. Eleifend et vitae tincidunt non et id tortor blandit.',
            'bio_image_1' => 'img/imagebio1.jpg',
            'bio_image_2' => 'img/imagebio2.jpg',
            'bio_image_3' => 'img/imagebio3.jpg',
            'booking_description' => 'Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum.',
            'booking_phone' => '+33 X XXX XXX XX / +225 X XXX XXX XX',
            'booking_email' => 'EMAILFATTOURÉ@BOOKING.COM',
        ]);

        if ($actrice->wasRecentlyCreated) {
            $actrice->works()->createMany([
                ['title' => '3 COLD DISHES / 2025', 'year_or_label' => '2025', 'image' => 'img/image14.jpg', 'role_or_description' => 'Dans le rôle de Nollywire'],
                ['title' => 'CACAO / 2020', 'year_or_label' => '2020', 'image' => 'img/image15.jpg', 'role_or_description' => 'Dans le rôle de Manuella Ahitey'],
                ['title' => 'LE TICKET À TOUT PRIX', 'year_or_label' => '', 'image' => 'img/image16.png', 'role_or_description' => 'Dans le rôle de'],
            ]);

            $actrice->news()->createMany([
                ['title' => 'AFRIFF 2025 : FAT TOURÉ...', 'description' => 'Proin dictum pellentesque tempor...', 'image' => 'img/actualité1.jpg', 'link' => '#', 'is_featured' => true],
                ['title' => 'PRIX DU MEILLEUR FILM...', 'description' => 'Proin dictum pellentesque tempor...', 'image' => 'img/actualité3.jpg', 'link' => '#'],
                ['title' => '" FAT TOURÉ, L’ACTRICE IVOIRIENNE... "', 'description' => 'Proin dictum pellentesque tempor...', 'image' => 'img/actualité2.jpg', 'link' => '#'],
                ['title' => 'NOUVELLE ACTUALITÉ...', 'description' => 'Proin dictum pellentesque tempor...', 'image' => 'img/actualité4.jpg', 'link' => '#'],
            ]);

            $actrice->agendas()->createMany([
                ['day' => '06', 'month' => 'NOV.', 'title' => 'AVANT PREMIÈRE DU FILM 3 COLD DISHES À LAGOS', 'description' => 'Proin dictum pellentesque tempor...', 'image' => 'img/image14.jpg'],
                ['day' => '09', 'month' => 'NOV.', 'title' => 'NOMINATION DANS LA CATÉGORIE MEILLEURE ACTRICE', 'description' => 'Proin dictum pellentesque tempor...', 'image' => 'img/actualité1.jpg'],
                ['day' => '27', 'month' => 'NOV.', 'title' => 'AVANT PREMIÈRE DU FILM 3 COLD DISHES À ABIDJAN', 'description' => 'Proin dictum pellentesque tempor...', 'image' => 'img/image14.jpg'],
            ]);

            $actrice->teasers()->createMany([
                ['title' => '3 COLD DISHES / 2025', 'poster_image' => 'img/image14.jpg', 'video_url' => '#'],
                ['title' => '3 COLD DISHES / 2025', 'poster_image' => 'img/image14.jpg', 'video_url' => '#'],
                ['title' => '3 COLD DISHES / 2025', 'poster_image' => 'img/image14.jpg', 'video_url' => '#'],
            ]);

            $actrice->socialLinks()->createMany([
                ['platform' => 'facebook', 'url' => '#'],
                ['platform' => 'instagram', 'url' => '#'],
                ['platform' => 'tiktok', 'url' => '#'],
                ['platform' => 'x', 'url' => '#'],
            ]);
        }

        $entrepreneur = \App\Models\Page::firstOrCreate([
            'slug' => 'entrepreneur',
        ], [
            'name' => 'Entrepreneur Immobilier',
            'sort_order' => 4,
            'is_published' => true,
            'card_image' => 'img/entrepreneur.png',
            'title' => 'BIENVENUE SUR LE SITE DE',
            'subtitle' => 'FAT TOURÉ',
            'header_image' => 'img/entrepeneur.jpg',
            'bio_title' => 'LOREM IPSUM DOLOR SIT AMET...',
            'bio_content' => 'Proin dictum pellentesque tempor amet semper...',
            'bio_image_1' => 'img/entre01.jpg',
            'bio_image_2' => 'img/entre02.jpg',
            'bio_image_3' => 'img/entre04.jpg',
            'booking_description' => '...',
            'booking_phone' => '...',
            'booking_email' => '...',
        ]);

        if ($entrepreneur->wasRecentlyCreated) {
            $entrepreneur->works()->createMany([
                ['title' => 'LOREM IPSUM DOLOR SIT AMET', 'year_or_label' => 'XXXXXX', 'image' => 'img/Frame3.png', 'role_or_description' => ''],
                ['title' => 'LOREM IPSUM DOLOR SIT AMET', 'year_or_label' => 'XXXXXX', 'image' => 'img/Frame4.png', 'role_or_description' => ''],
                ['title' => 'LOREM IPSUM DOLOR SIT AMET', 'year_or_label' => 'XXXXXX', 'image' => 'img/Frame5.png', 'role_or_description' => ''],
            ]);
        }

        $presentatrice = \App\Models\Page::firstOrCreate([
            'slug'                => 'presentatrice',
        ], [
            'name'                => 'Présentatrice',
            'sort_order'          => 2,
            'is_published'        => true,
            'card_image'          => 'img/presentatrice.png',
            'title'               => 'BIENVENUE SUR LE SITE DE',
            'subtitle'            => 'FAT TOURÉ',
            'header_image'        => 'img/presentatrice.png',
            'bio_title'           => 'LOREM IPSUM DOLOR SIT AMET...',
            'bio_content'         => 'Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo.',
            'bio_image_1'         => 'img/imagebio1.jpg',
            'bio_image_2'         => 'img/imagebio2.jpg',
            'bio_image_3'         => 'img/imagebio3.jpg',
            'booking_description' => 'Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo.',
            'booking_phone'       => '+33 X XXX XXX XX / +225 X XXX XXX XX',
            'booking_email'       => 'EMAILFATTOURÉ@BOOKING.COM',
        ]);

        if ($presentatrice->wasRecentlyCreated) {
            $presentatrice->socialLinks()->createMany([
                ['platform' => 'facebook',  'url' => '#'],
                ['platform' => 'instagram', 'url' => '#'],
                ['platform' => 'tiktok',    'url' => '#'],
                ['platform' => 'x',         'url' => '#'],
            ]);
        }

        $modele = \App\Models\Page::firstOrCreate([
            'slug'                => 'modele',
        ], [
            'name'                => 'Modèle',
            'sort_order'          => 3,
            'is_published'        => true,
            'card_image'          => 'img/modèle.png',
            'title'               => 'BIENVENUE SUR LE SITE DE',
            'subtitle'            => 'FAT TOURÉ',
            'header_image'        => 'img/modèle.png',
            'bio_title'           => 'LOREM IPSUM DOLOR SIT AMET...',
            'bio_content'         => 'Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo.',
            'bio_image_1'         => 'img/imagebio1.jpg',
            'bio_image_2'         => 'img/imagebio2.jpg',
            'bio_image_3'         => 'img/imagebio3.jpg',
            'booking_description' => 'Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo.',
            'booking_phone'       => '+33 X XXX XXX XX / +225 X XXX XXX XX',
            'booking_email'       => 'EMAILFATTOURÉ@BOOKING.COM',
        ]);

        if ($modele->wasRecentlyCreated) {
            $modele->works()->createMany([
                ['title' => 'COLLECTION PRINTEMPS 2025', 'year_or_label' => '2025', 'image' => 'img/imagebio1.jpg', 'role_or_description' => 'Campagne prêt-à-porter'],
                ['title' => 'DÉFILÉ ABIDJAN FASHION WEEK', 'year_or_label' => '2024', 'image' => 'img/imagebio2.jpg', 'role_or_description' => 'Tête d\'affiche'],
                ['title' => 'COUVERTURE MAGAZINE MODE', 'year_or_label' => '2024', 'image' => 'img/imagebio3.jpg', 'role_or_description' => 'Édition spéciale'],
            ]);

            $modele->socialLinks()->createMany([
                ['platform' => 'facebook',  'url' => '#'],
                ['platform' => 'instagram', 'url' => '#'],
                ['platform' => 'tiktok',    'url' => '#'],
                ['platform' => 'x',         'url' => '#'],
            ]);
        }

        // Réglages globaux du site (page d'accueil, booking, galerie réseaux).
        \App\Models\SiteSetting::updateOrCreate([], [
            'home_title'     => "BIENVENUE DANS\nL'UNIVERS DE FAT TOURÉ",
            'home_subtitle'  => "CLIQUEZ SUR UNE PHOTO POUR DÉCOUVRIR L'UNIVERS",
            'booking_phone'  => '+33 X XXX XXX XX / +225 X XXX XXX XX',
            'booking_email'  => 'EMAILFATTOURÉ@BOOKING.COM',
            'social_title'   => 'SUIVEZ-MOI SUR MES RÉSEAUX',
            'gallery_images' => [
                'img/imagebio3.jpg',
                'img/imagebio1.jpg',
                'img/imagebio2.jpg',
                'img/actualité1.jpg',
                'img/actualité2.jpg',
                'img/accueil-actrice.jpg',
            ],
        ]);
    }
}
