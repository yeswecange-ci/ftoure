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
        Schema::table('news', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
            $table->json('gallery')->nullable()->after('image');
        });

        foreach (DB::table('news')->whereNull('slug')->get() as $row) {
            DB::table('news')->where('id', $row->id)->update([
                'slug' => $this->uniqueSlug($row->title, $row->id),
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['slug', 'gallery']);
        });
    }

    private function uniqueSlug(?string $title, int $id): string
    {
        $base = Str::slug($title ?: 'article-'.$id) ?: 'article-'.$id;
        $slug = $base;
        $i = 1;
        while (DB::table('news')->where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $base.'-'.(++$i);
        }

        return $slug;
    }
};
