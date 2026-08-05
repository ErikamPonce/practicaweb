#!/bin/bash
set -e

# Generate an APP_KEY if one isn't already set (first boot convenience).
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ]; then
    php artisan key:generate --force
fi

# Wait for the database to accept connections before running migrations.
if [ "$DB_CONNECTION" = "mysql" ]; then
    echo "Esperando a la base de datos ($DB_HOST:$DB_PORT)..."
    for i in $(seq 1 30); do
        if php -r "
            \$c = @fsockopen('$DB_HOST', $DB_PORT);
            if (\$c) { fclose(\$c); exit(0); }
            exit(1);
        "; then
            echo "Base de datos disponible."
            break
        fi
        sleep 2
    done
fi

php artisan config:cache
php artisan route:cache
php artisan view:cache

php artisan migrate --force

if [ "$DB_SEED_ON_BOOT" = "true" ]; then
    php artisan db:seed --force
fi

exec "$@"
