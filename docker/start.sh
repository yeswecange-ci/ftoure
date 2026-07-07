#!/bin/sh
set -e

cd /var/www/html

# ── Volume persistant (Coolify) ───────────────────────────────────────────────
# storage/app/public est monté sur un volume : au premier montage il est vide et
# appartient a root. On recree l'arborescence attendue et on rend la main a
# www-data (php-fpm) pour que les uploads Filament fonctionnent apres deploiement.
echo "==> Preparation du stockage persistant..."
mkdir -p \
    storage/app/public \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "==> Lien storage..."
php artisan storage:link --force

echo "==> Migrations..."
php artisan migrate --force

echo "==> Optimisation (config, routes, vues, events)..."
php artisan optimize

echo "==> Assets Filament..."
php artisan filament:assets 2>/dev/null || true

echo "==> Démarrage nginx + php-fpm..."
exec /usr/bin/supervisord -c /etc/supervisord.conf
