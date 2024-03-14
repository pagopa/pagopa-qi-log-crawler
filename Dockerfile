FROM php:8.2-fpm


RUN apt -y update -y && apt -y upgrade && apt -y install git libpq-dev libzip-dev zip libmemcached-dev && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install pdo pdo_pgsql pgsql && docker-php-ext-install zip
RUN cd /tmp && curl -k https://getcomposer.org/installer -o composer-setup.php && php composer-setup.php && mv composer.phar /usr/local/bin/composer && rm -f composer-setup.php

RUN pecl install memcached && docker-php-ext-enable memcached && mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

USER root:root

# git clone del progetto che deve andare a finire in /var/www/html/crawler
# run del comando composer install dalla directory /var/www/html/crawler

# from https://getcomposer.org/doc/faqs/should-i-commit-the-dependencies-in-my-vendor-directory.md
# remove all .git directory from installed dependencies
#    find vendor/ -type d -name ".git" -exec rm -rf {} \;
#
#    Add a .gitignore rule (/vendor/**/.git)


# valutare questo dockerfile
##   FROM alpine:latest as git_repo
##
##   RUN apk upgrade && apk update && apk add git
##
##   WORKDIR /tmp
##
##   RUN git clone https://github.com/pagopa/pagopa-qi-log-crawler
##
##
##
##   FROM composer:latest as composer
##
##   RUN mkdir -p /tmp/repo
##
##   COPY --from=git_repo /tmp/pagopa-qi-log-crawler/src /tmp/repo/
##
##   WORKDIR /tmp/repo
##
##   RUN composer install
##
##   FROM php:8.2-fpm
##
##   RUN mkdir -p /var/www/html/sherlock
##
##   COPY --from=composer /tmp/repo/ /var/www/html/sherlock