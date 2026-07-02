<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('works', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
            $table->text('description')->nullable()->after('role_or_description');
            $table->json('gallery')->nullable()->after('image');
            $table->unsignedInteger('sort_order')->default(0)->after('gallery');
        });

        // Génère un slug pour les enregistrements existants.
        foreach (DB::table('works')->whereNull('slug')->get() as $row) {
            DB::table('works')->where('id', $row->id)->update([
                'slug' => $this->uniqueSlug($row->title, $row->id),
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn(['slug', 'description', 'gallery', 'sort_order']);
        });
    }

    private function uniqueSlug(?string $title, int $id): string
    {
        $base = Str::slug($title ?: 'realisation-'.$id) ?: 'realisation-'.$id;
        $slug = $base;
        $i = 1;
        while (DB::table('works')->where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $base.'-'.(++$i);
        }

        return $slug;
    }
};
