<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'header_image',
        'bio_title',
        'bio_content',
        'bio_image_1',
        'bio_image_2',
        'bio_image_3',
        'booking_description',
        'booking_phone',
        'booking_email',
    ];

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }

    public function teasers()
    {
        return $this->hasMany(Teaser::class);
    }

    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class);
    }
}
