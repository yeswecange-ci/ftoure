<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'page_id',
        'title',
        'description',
        'image',
        'link',
        'is_featured',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
