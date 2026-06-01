#!/bin/sh
set -e

cd /var/www/html

echo "==> [1/6] Lien storage..."
php artisan storage:link --force

echo "==> [2/6] Migrations..."
php artisan migrate --force

echo "==> [3/6] Effacement des anciens caches..."
php artisan optimize:clear

echo "==> [4/6] Reconstruction des caches (config, routes, vues, events)..."
php artisan optimize

echo "==> [5/6] Publication des assets Filament..."
php artisan filament:assets 2>/dev/null || true

echo "==> [6/6] Démarrage nginx + php-fpm..."
exec /usr/bin/supervisord -c /etc/supervisord.conf
