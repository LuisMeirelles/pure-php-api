FROM php:8-apache

WORKDIR /var/www/html

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf

RUN pecl install xdebug

COPY config/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/

RUN apt update \
    && apt upgrade -y \
    && apt install iputils-ping -y