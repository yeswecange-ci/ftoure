<?php

namespace App\Http\Controllers;

use App\Models\Distinction;
use App\Models\News;
use App\Models\Page;
use App\Models\Shooting;
use App\Models\Work;
use Illuminate\Contracts\View\View;

class DetailController extends Controller
{
    /**
     * Page de détail d'une réalisation / filmographie.
     */
    public function work(string $universe, string $slug): View
    {
        return $this->render($universe, Work::class, $slug, [
            'section' => 'Réalisation',
            'section_anchor' => 'filmographie',
        ]);
    }

    /**
     * Page de détail d'une distinction / nomination (univers actrice).
     */
    public function distinction(string $universe, string $slug): View
    {
        return $this->render($universe, Distinction::class, $slug, [
            'section' => 'Distinction & Nomination',
            'section_anchor' => 'distinctions',
        ]);
    }

    /**
     * Page de détail d'un shooting (univers modèle).
     */
    public function shooting(string $universe, string $slug): View
    {
        return $this->render($universe, Shooting::class, $slug, [
            'section' => 'Shooting',
            'section_anchor' => 'shooting',
        ]);
    }

    /**
     * Page de détail d'un article / actualité.
     */
    public function news(string $universe, string $slug): View
    {
        return $this->render($universe, News::class, $slug, [
            'section' => 'Actualité / Presse',
            'section_anchor' => 'actualite',
        ]);
    }

    /**
     * Résout l'univers et l'élément, puis renvoie la vue de détail commune.
     *
     * @param  class-string  $model
     * @param  array<string, string>  $meta
     */
    private function render(string $universe, string $model, string $slug, array $meta): View
    {
        $page = Page::where('slug', $universe)->firstOrFail();

        /** @var \App\Models\Work|\App\Models\Distinction|\App\Models\Shooting|\App\Models\News $item */
        $item = $model::where('page_id', $page->id)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('detail', [
            'page' => $page,
            'item' => $item,
            'section' => $meta['section'],
            'sectionAnchor' => $meta['section_anchor'],
        ]);
    }
}
