#!/bin/bash

# carrega as variáveis de ambiente
source /var/www/.env

# Espera o banco ficar disponível antes de migrar
echo "Aguardando o banco de dados subir..."
while ! nc -z $DB_HOST $DB_PORT; do
  sleep 1
done
echo "Banco de dados disponível!"

cd /var/www

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

composer install --no-dev --optimize-autoloader

chown -R www-data:www-data /var/www
chmod -R 755 /var/www

# Roda as migrations
php artisan migrate --force