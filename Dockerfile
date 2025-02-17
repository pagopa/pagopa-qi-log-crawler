FROM composer:latest@sha256:59ee7d4d85c5ea88e3eb91ef2f93498e7bab51526327a479b4cb9f4d9b4bd567 as composer
RUN mkdir -p /tmp/repo
COPY . /tmp/repo/
WORKDIR /tmp/repo
RUN composer install --no-dev

FROM php:8.2-fpm@sha256:7c00ae6c9345f86c50dfae1870eeb30d527de3ba6f02e64bd0eeae1686e2c79f
COPY --from=composer /tmp/repo /var/www/html
RUN apt -y update && \
   apt -y upgrade && \
   apt -y install curl libpq-dev libzip-dev zip && \
   docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
   docker-php-ext-install pdo pdo_pgsql pgsql && \
   docker-php-ext-install zip && \
   mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini