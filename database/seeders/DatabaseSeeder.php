<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedAdminUser();

        $this->call(PageSeeder::class);
    }

    /**
     * Crée le compte administrateur.
     *
     * En production, l'admin est créé à partir des variables d'environnement
     * ADMIN_EMAIL / ADMIN_PASSWORD (aucun compte n'est créé si elles sont
     * absentes). En local/test, un compte de démonstration est utilisé.
     */
    protected function seedAdminUser(): void
    {
        $email = config('app.admin_email');
        $password = config('app.admin_password');

        if ($email && $password) {
            User::updateOrCreate(
                ['email' => $email],
                ['name' => 'Administrateur', 'password' => Hash::make($password)],
            );

            return;
        }

        // Compte de démonstration : uniquement hors production.
        if (! app()->environment('production')) {
            User::updateOrCreate(
                ['email' => 'test@example.com'],
                ['name' => 'Test User', 'password' => Hash::make('password')],
            );
        }
    }
}
