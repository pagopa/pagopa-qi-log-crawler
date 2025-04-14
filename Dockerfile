FROM composer:latest@sha256:d9d52c36baea592479eb7e024d4c1afaba9bdea27d67566c588d290a31b4b0d1 as composer
RUN mkdir -p /tmp/repo
COPY . /tmp/repo/
WORKDIR /tmp/repo
RUN composer install --no-dev

FROM php:8.2-fpm@sha256:8308d0367ecc789ce3d91d6ecd8fd48bb94578f5380d8351b40c04a14d9465d4
COPY --from=composer /tmp/repo /var/www/html
RUN apt -y update && \
   apt -y upgrade && \
   apt -y install curl libpq-dev libzip-dev zip && \
   docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
   docker-php-ext-install pdo pdo_pgsql pgsql && \
   docker-php-ext-install zip && \
   mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini