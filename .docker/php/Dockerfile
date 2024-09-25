FROM php:8.3-fpm
RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
WORKDIR /var/www/html
COPY ./php.ini /usr/local/etc/php/php.ini
