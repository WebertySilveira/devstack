FROM php:8.3-fpm


RUN pecl install xdebug \
    docker-php-ext-enable xdebug
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    git \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip pdo pdo_mysql mbstring gd exif opcache


WORKDIR /var/www/html
COPY ./php.ini /usr/local/etc/php/php.ini
