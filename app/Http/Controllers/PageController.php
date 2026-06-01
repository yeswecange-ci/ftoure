<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    /** Relations chargées pour l'affichage d'un univers. */
    private const RELATIONS = ['works', 'news', 'agendas', 'teasers', 'socialLinks'];

    /**
     * Page d'accueil : sélection des univers.
     */
    public function home(): View
    {
        return view('welcome');
    }

    /**
     * Affiche un univers (actrice, présentatrice, modèle, entrepreneur).
     *
     * Le slug est fixé par la route (route defaults) ; la vue associée
     * porte le même nom que le slug.
     */
    public function show(string $slug): View
    {
        $page = Page::with(self::RELATIONS)
            ->where('slug', $slug)
            ->firstOrFail();

        return view($slug, compact('page'));
    }
}
