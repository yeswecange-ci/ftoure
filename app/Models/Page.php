<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use ResolvesMediaUrl;

    /** Univers publiés, classés par ordre d'affichage. */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)->orderBy('sort_order');
    }

    protected $fillable = [
        'slug',
        'name',
        'title',
        'subtitle',
        'header_image',
        'card_image',
        'sort_order',
        'is_published',
        'bio_title',
        'bio_content',
        'bio_image_1',
        'bio_image_2',
        'bio_image_3',
        'booking_description',
        'booking_phone',
        'booking_email',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function works()
    {
        return $this->hasMany(Work::class)->orderBy('sort_order')->orderBy('id');
    }

    public function distinctions()
    {
        return $this->hasMany(Distinction::class)->orderBy('sort_order')->orderBy('id');
    }

    public function shootings()
    {
        return $this->hasMany(Shooting::class)->orderBy('sort_order')->orderBy('id');
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

    /**
     * Libellé d'affichage de l'univers (page d'accueil, navigation…).
     * Retombe sur le slug capitalisé si aucun nom n'est renseigné.
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->name ?: ucfirst($this->slug);
    }

    public function getHeaderImageUrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->header_image);
    }

    /**
     * Image de la vignette d'univers : retombe sur l'image d'en-tête
     * si aucune image de carte dédiée n'est définie.
     */
    public function getCardImageUrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->card_image ?: $this->header_image);
    }

    public function getBioImage1UrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->bio_image_1);
    }

    public function getBioImage2UrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->bio_image_2);
    }

    public function getBioImage3UrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->bio_image_3);
    }
}
