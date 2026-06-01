# Site Fat Touré

Site vitrine multi-univers de **Fat Touré** (Actrice, Présentatrice, Modèle, Entrepreneur immobilier), avec back-office d'administration **Filament**. Tout le contenu éditorial (textes, images, vidéos, liens, agenda, actualités…) est administrable depuis le tableau de bord.

- **Stack** : Laravel 13 · PHP 8.3+ · Filament 5 · Tailwind CSS 4 (Vite) · MySQL
- **Back-office** : `/admin`
- **Locale** : Français (traduction FR/EN via widget Google Translate)

## Installation locale

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
```

Pour un développement local rapide sans base MySQL, un fichier `.env.local` (SQLite) est utilisable :

```bash
php artisan migrate --seed --env=local   # crée + peuple une base SQLite locale
php artisan storage:link --env=local
npm run build                            # ou: npm run dev
APP_ENV=local php artisan serve
```

Compte de démonstration (hors production uniquement) : `test@example.com` / `password`.

## Contenu administrable depuis le dashboard

| Écran Filament | Contenu |
|---|---|
| **Pages** (univers) | Nom, vignette d'accueil, ordre, publication, en-tête (titre/sous-titre/image), biographie, booking |
| **Pages → onglets** | Réalisations, Actualités, Agenda, Teasers (vidéo uploadée ou lien), Réseaux sociaux |
| **Paramètres du site** | Titre/sous-titre de l'accueil, booking de l'accueil, titre + galerie de la section « réseaux » |

Aucun texte ni image de la partie publique n'est codé en dur : la page d'accueil, le bloc « Découvrez aussi » et la galerie réseaux sont pilotés par les données.

## Tests

```bash
php artisan test
```

Couvre le rendu de la page d'accueil et des 4 univers, le 404, l'accès au back-office, et l'enregistrement des paramètres du site.

## Déploiement

Image Docker de production (multi-stage : build des assets + nginx + php-fpm + supervisor) :

```bash
docker build -t fat-toure .
docker run -p 80:80 --env-file .env fat-toure
```

Au démarrage, le conteneur exécute `storage:link`, `migrate --force`, `optimize` et publie les assets Filament.

### Variables d'environnement clés

| Variable | Rôle |
|---|---|
| `APP_KEY`, `APP_URL`, `DB_*` | Standard Laravel |
| `ADMIN_EMAIL`, `ADMIN_PASSWORD` | Compte administrateur créé/mis à jour par le seeder en production |

> Le panel `/admin` est restreint via `User::canAccessPanel()` ; aucun compte de démonstration n'est créé en production.
