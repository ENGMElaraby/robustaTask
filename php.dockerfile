FROM php:8.1-fpm-alpine

ADD ./php/www.conf /usr/local/etc/php-fpm.d/www.conf
ADD ./php/php.ini /usr/local/etc/php/php.ini-production
ADD ./php/php.ini /usr/local/etc/php/php.ini-development
ADD ./php/php.ini /usr/local/etc/php/php.ini

RUN addgroup -g 1000 robusta && adduser -G robusta -g robusta -s /bin/sh -D robusta

RUN mkdir -p /var/www/html

RUN chown robusta:robusta /var/www/html

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql mysqli