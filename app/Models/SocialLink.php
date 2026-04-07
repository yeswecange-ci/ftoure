<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'page_id',
        'platform',
        'url',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
