<?php

namespace Tests\Feature;

use Database\Seeders\PageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PublicSiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(PageSeeder::class);
    }

    public function test_home_page_renders_with_editable_settings(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('UNIVERS DE FAT TOURÉ', escape: false);
        // Les 4 univers publiés sont listés sur l'accueil.
        $response->assertSee('Actrice');
        $response->assertSee('Entrepreneur Immobilier');
    }

    public static function universeRoutes(): array
    {
        return [
            'actrice' => ['actrice'],
            'presentatrice' => ['presentatrice'],
            'modele' => ['modele'],
            'entrepreneur' => ['entrepreneur'],
        ];
    }

    #[DataProvider('universeRoutes')]
    public function test_universe_pages_render(string $routeName): void
    {
        $this->get(route($routeName))
            ->assertOk()
            ->assertSee('BIOGRAPHIE')
            ->assertSee('BOOKING');
    }

    public function test_unknown_universe_returns_404(): void
    {
        // Une page non semée déclenche un firstOrFail() -> 404.
        \App\Models\Page::where('slug', 'actrice')->delete();

        $this->get(route('actrice'))->assertNotFound();
    }

    public function test_social_gallery_reflects_settings(): void
    {
        $settings = \App\Models\SiteSetting::current();
        $settings->update([
            'social_title' => 'MES RESEAUX A MOI',
            'gallery_images' => ['img/imagebio1.jpg'],
        ]);

        $this->get(route('actrice'))
            ->assertOk()
            ->assertSee('MES RESEAUX A MOI');
    }
}
