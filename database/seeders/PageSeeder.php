<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actrice = \App\Models\Page::create([
            'slug' => 'actrice',
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

        $actrice->works()->createMany([
            ['title' => '3 COLD DISHES / 2025', 'year_or_label' => '2025', 'image' => 'img/image14.jpg', 'role_or_description' => 'Dans le rôle de Nollywire'],
            ['title' => 'CACAO / 2020', 'year_or_label' => '2020', 'image' => 'img/image15.jpg', 'role_or_description' => 'Dans le rôle de Manuella Ahitey'],
            ['title' => 'LE TICKET À TOUT PRIX', 'year_or_label' => '', 'image' => 'img/image16.png', 'role_or_description' => 'Dans le rôle de'],
        ]);

        $actrice->news()->createMany([
            ['title' => 'AFRIFF 2025 : FAT TOURÉ...', 'description' => 'Proin dictum pellentesque tempor...', 'image' => 'img/actualité1.jpg', 'link' => '#', 'is_featured' => true],
            ['title' => 'PRIX DU MEILLEUR FILM...', 'description' => 'Proin dictum pellentesque tempor...', 'image' => 'img/actualité3.jpg', 'link' => '#'],
            ['title' => '" FAT TOURÉ, L’ACTRICE IVOIRIENNE... "', 'description' => 'Proin dictum pellentesque tempor...', 'image' => 'img/actualité2.jpg', 'link' => '#'],
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

        $entrepreneur = \App\Models\Page::create([
            'slug' => 'entrepreneur',
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

        $entrepreneur->works()->createMany([
            ['title' => 'LOREM IPSUM DOLOR SIT AMET', 'year_or_label' => 'XXXXXX', 'image' => 'img/Frame3.png', 'role_or_description' => ''],
            ['title' => 'LOREM IPSUM DOLOR SIT AMET', 'year_or_label' => 'XXXXXX', 'image' => 'img/Frame4.png', 'role_or_description' => ''],
            ['title' => 'LOREM IPSUM DOLOR SIT AMET', 'year_or_label' => 'XXXXXX', 'image' => 'img/Frame5.png', 'role_or_description' => ''],
        ]);

        \App\Models\Page::firstOrCreate(
            ['slug' => 'presentatrice'],
            [
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
            ]
        );
    }
}
