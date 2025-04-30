# Etapa de build do Vite (frontend)
FROM node:20 AS vitebuilder

WORKDIR /app
COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build

# Etapa principal com PHP e Laravel
FROM php:8.2-fpm

RUN apt update && \
    apt install -y --no-install-recommends \
        libpq-dev \
        git \
        unzip \
        zip \
        curl \
        libonig-dev && \
    docker-php-ext-install pdo pdo_pgsql mbstring && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Copia arquivos gerados do Vite
COPY --from=vitebuilder /app/public/build ./public/build

# Entrypoint para rodar as migrations
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]
