FROM composer:latest as composer
RUN mkdir -p /tmp/repo
COPY . /tmp/repo/
WORKDIR /tmp/repo
RUN composer install --no-dev

FROM php:8.2-fpm
COPY --from=composer /tmp/repo /var/www/html
RUN apt -y update && \
   apt -y upgrade && \
   apt -y install curl libpq-dev libzip-dev zip && \
   docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
   docker-php-ext-install pdo pdo_pgsql pgsql && \
   docker-php-ext-install zip && \
   mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini