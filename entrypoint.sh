#!/bin/bash

# Espera o PostgreSQL estar disponível
until nc -z -v -w30 postgres 5432
do
  echo "Aguardando o PostgreSQL..."
  sleep 5
done

# Executa as migrations
php artisan migrate --force

# Inicia o PHP-FPM
exec "$@"
