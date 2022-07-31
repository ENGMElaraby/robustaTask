FROM composer:2

RUN addgroup -g 1000 robusta && adduser -G robusta -g robusta -s /bin/sh -D robusta

WORKDIR /var/www/html
