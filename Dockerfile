FROM composer:latest@sha256:706b731de8fe83b64bb542bec1d6f20f95d300e21fbcc6f3f1b7fab39892e90e as composer
RUN mkdir -p /tmp/repo
COPY . /tmp/repo/
WORKDIR /tmp/repo
RUN composer install --no-dev

FROM php:8.2-fpm@sha256:78234d3aeebce59eb9cb36e9f039e66ebbd5da47a796103c2a45d016596de10f
COPY --from=composer /tmp/repo /var/www/html
RUN apt -y update && \
   apt -y upgrade && \
   apt -y install curl libpq-dev libzip-dev zip && \
   docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
   docker-php-ext-install pdo pdo_pgsql pgsql && \
   docker-php-ext-install zip && \
   mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini