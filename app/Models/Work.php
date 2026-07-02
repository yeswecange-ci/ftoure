<?php

namespace App\Models;

use App\Models\Concerns\GeneratesSlug;
use App\Models\Concerns\HasGallery;
use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use GeneratesSlug;
    use HasGallery;
    use ResolvesMediaUrl;

    protected $fillable = [
        'page_id',
        'title',
        'slug',
        'year_or_label',
        'image',
        'gallery',
        'role_or_description',
        'description',
        'sort_order',
    ];

    protected $casts = [
        'gallery' => 'array',
        'sort_order' => 'integer',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->image);
    }
}
