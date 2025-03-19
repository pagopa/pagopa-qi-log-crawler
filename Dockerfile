FROM composer:latest@sha256:685473b4cd31d70bfe71926409f812d5dd9245972d38b659ba35d70f4007808c as composer
RUN mkdir -p /tmp/repo
COPY . /tmp/repo/
WORKDIR /tmp/repo
RUN composer install --no-dev

FROM php:8.2-fpm@sha256:c8109bd894c826bf3ed7c603c5bffc0c8d2f6d6506a759560241915a213cb911
COPY --from=composer /tmp/repo /var/www/html
RUN apt -y update && \
   apt -y upgrade && \
   apt -y install curl libpq-dev libzip-dev zip && \
   docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
   docker-php-ext-install pdo pdo_pgsql pgsql && \
   docker-php-ext-install zip && \
   mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini