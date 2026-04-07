<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Work extends Model
{
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
        if (! $this->image) {
            return null;
        }

        return Str::startsWith($this->image, 'img/')
            ? asset($this->image)
            : Storage::url($this->image);
    }
}
