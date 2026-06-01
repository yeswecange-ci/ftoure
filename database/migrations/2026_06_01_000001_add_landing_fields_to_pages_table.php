<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Champs pilotant l'affichage des univers sur la page d'accueil
     * et dans le bloc « Découvrez aussi ».
     */
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (! Schema::hasColumn('pages', 'name')) {
                $table->string('name')->nullable()->after('slug');
            }
            if (! Schema::hasColumn('pages', 'card_image')) {
                $table->string('card_image')->nullable()->after('header_image');
            }
            if (! Schema::hasColumn('pages', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0)->after('card_image');
            }
            if (! Schema::hasColumn('pages', 'is_published')) {
                $table->boolean('is_published')->default(true)->after('sort_order');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['name', 'card_image', 'sort_order', 'is_published']);
        });
    }
};
