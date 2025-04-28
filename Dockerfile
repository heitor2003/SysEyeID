FROM node:20 AS vitebuilder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

FROM php:8.2-fpm

RUN apt-get update && apt-get install -y unzip libpq-dev netcat-openbsd && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www

COPY --from=vitebuilder /app /var/www
COPY entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh && chown -R www-data:www-data /var/www

EXPOSE 9000

ENTRYPOINT ["/entrypoint.sh"]