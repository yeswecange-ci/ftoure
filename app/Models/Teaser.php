<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teaser extends Model
{
    protected $fillable = [
        'page_id',
        'title',
        'poster_image',
        'video_url',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
