<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use ResolvesMediaUrl;

    protected $fillable = [
        'page_id',
        'title',
        'year_or_label',
        'image',
        'role_or_description',
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
