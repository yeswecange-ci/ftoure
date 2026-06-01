<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Réglages globaux du site (ligne unique) : contenu de la page d'accueil,
     * coordonnées de booking globales, section réseaux sociaux + galerie.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('home_title')->nullable();
            $table->string('home_subtitle')->nullable();
            $table->string('booking_phone')->nullable();
            $table->string('booking_email')->nullable();
            $table->string('social_title')->nullable();
            $table->json('gallery_images')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
