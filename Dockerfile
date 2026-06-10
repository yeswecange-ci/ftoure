# ── Stage 1 : build des assets front-end ──────────────────────────────────────
FROM node:22-alpine AS frontend

WORKDIR /app
COPY package.json package-lock.json* ./
RUN npm ci
COPY . .
RUN npm run build

# ── Stage 2 : image de production ─────────────────────────────────────────────
FROM php:8.4-fpm-alpine

# Dépendances système + extensions PHP
RUN apk add --no-cache \
        nginx \
        supervisor \
        curl \
        zip \
        unzip \
        git \
        libxml2-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        libwebp-dev \
        freetype-dev \
        icu-dev \
        libzip-dev \
        libexif-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install \
        pdo_mysql \
        xml \
        bcmath \
        gd \
        exif \
        intl \
        zip \
        opcache \
        pcntl

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# ── Dépendances PHP (cache layer séparé) ─────────────────────────────────────
COPY composer.json composer.lock ./
RUN composer install \
        --no-dev \
        --optimize-autoloader \
        --no-interaction \
        --no-scripts

# ── Code source ───────────────────────────────────────────────────────────────
# Passer --build-arg CACHEBUST=$(date +%s) pour forcer un rebuild complet
ARG CACHEBUST=1
RUN echo "Build: $CACHEBUST"
COPY . .

# Assets front-end compilés
COPY --from=frontend /app/public/build ./public/build

# Dossiers runtime exclus par .dockerignore (cache/logs/sessions/vues)
# Recréés ici : Laravel en a besoin au build (manifest) et au démarrage (optimize)
RUN mkdir -p \
        bootstrap/cache \
        storage/framework/cache \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs

# Scripts post-install
RUN composer run-script post-autoload-dump --no-interaction 2>/dev/null || true

# Publication des assets Filament dans public/vendor/filament/
RUN php artisan filament:assets 2>/dev/null || true

# Configuration PHP
COPY docker/php.ini /usr/local/etc/php/conf.d/app.ini

# Permissions
RUN chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache \
    && chmod -R 775 \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache

# Configs nginx + supervisor
COPY docker/nginx.conf      /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/start.sh        /start.sh
RUN chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]
