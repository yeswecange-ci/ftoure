<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use ResolvesMediaUrl;

    protected $fillable = [
        'page_id',
        'day',
        'month',
        'title',
        'description',
        'image',
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
