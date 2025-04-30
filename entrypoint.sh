#!/bin/bash

echo "Rodando migrations..."
php artisan migrate --force
exec php-fpm