<?php

namespace Tests\Feature;

use App\Filament\Pages\ManageSiteSettings;
use App\Models\SiteSetting;
use App\Models\User;
use Database\Seeders\PageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(PageSeeder::class);
    }

    public function test_login_page_is_accessible(): void
    {
        $this->get('/admin/login')->assertOk();
    }

    public function test_guest_is_redirected_from_admin(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_authenticated_user_can_access_admin(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/admin')->assertOk();
    }

    public function test_authenticated_user_can_open_site_settings(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin/manage-site-settings')
            ->assertOk();
    }

    public function test_authenticated_user_can_view_and_edit_a_page(): void
    {
        $user = User::factory()->create();
        $page = \App\Models\Page::firstOrFail();

        $this->actingAs($user)->get("/admin/pages/{$page->getKey()}")->assertOk();
        $this->actingAs($user)->get("/admin/pages/{$page->getKey()}/edit")->assertOk();
    }

    public function test_site_settings_can_be_saved_from_dashboard(): void
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(ManageSiteSettings::class)
            ->fillForm([
                'home_title' => 'NOUVEAU TITRE ACCUEIL',
                'home_subtitle' => 'Nouveau sous-titre',
                'booking_phone' => '+225 00 00 00 00',
                'booking_email' => 'contact@fat-toure.com',
                'social_title' => 'MES RESEAUX',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('NOUVEAU TITRE ACCUEIL', SiteSetting::current()->home_title);
        $this->assertSame('contact@fat-toure.com', SiteSetting::current()->booking_email);
    }
}
