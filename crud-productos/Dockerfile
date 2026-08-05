# syntax=docker/dockerfile:1

########################################
# Stage 1: build frontend assets (Vite)
########################################
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY resources ./resources
COPY vite.config.js ./
RUN npm run build

########################################
# Stage 2: install PHP dependencies
########################################
FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-scripts \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --ignore-platform-reqs

########################################
# Stage 3: runtime image
########################################
FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

RUN apk add --no-cache \
    libpng-dev \
    libzip-dev \
    libxml2-dev \
    oniguruma-dev \
    icu-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    bash \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    intl \
    && rm -rf /var/cache/apk/*

# Copiar el proyecto
COPY . .

# Dependencias PHP
COPY --from=vendor /app/vendor ./vendor

# Assets de Vite
COPY --from=frontend /app/public/build ./public/build

# Permisos
RUN addgroup -g 1000 www \
    && adduser -G www -g www -s /bin/sh -D www \
    && chown -R www:www /var/www/html \
    && chmod -R 775 storage bootstrap/cache

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

USER www

EXPOSE 10000

ENTRYPOINT ["entrypoint.sh"]

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]