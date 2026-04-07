<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // actrice, entrepreneur
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('header_image')->nullable();
            $table->string('bio_title')->nullable();
            $table->text('bio_content')->nullable();
            $table->string('bio_image_1')->nullable();
            $table->string('bio_image_2')->nullable();
            $table->string('bio_image_3')->nullable();
            $table->text('booking_description')->nullable();
            $table->string('booking_phone')->nullable();
            $table->string('booking_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
