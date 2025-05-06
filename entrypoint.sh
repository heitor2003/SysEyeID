#!/bin/bash

# Executa as migrations
php artisan migrate --force

# Inicia o PHP-FPM
exec "$@"
