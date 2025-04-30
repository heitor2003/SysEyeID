FROM node:20 as vitebuilder

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build

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

COPY --from=vitebuilder /app/public/build ./public/build

RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000
CMD ["php-fpm"]