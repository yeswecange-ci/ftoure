<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
