<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
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
}
