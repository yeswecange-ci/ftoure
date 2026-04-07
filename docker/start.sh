#!/bin/sh
set -e

cd /var/www/html

echo "==> Création du lien storage..."
php artisan storage:link --force

echo "==> Migrations..."
php artisan migrate --force

echo "==> Mise en cache config / routes / vues..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Démarrage des services..."
exec /usr/bin/supervisord -c /etc/supervisord.conf
