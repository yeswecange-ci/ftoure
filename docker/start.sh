#!/bin/sh
set -e

cd /var/www/html

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
