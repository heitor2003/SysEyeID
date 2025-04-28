#!/bin/bash

# Espera o banco ficar disponível antes de migrar
echo "Aguardando o banco de dados subir..."
until nc -z $DB_HOST $DB_PORT; do
  sleep 2
done

# Roda as migrations
php artisan migrate --force

# Inicia o servidor php-fpm ou outro processo principal
php-fpm
    