FROM nginx:stable-alpine

ADD ./nginx/nginx.conf /etc/nginx/nginx.conf
ADD ./nginx/default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html

RUN addgroup -g 1000 robusta && adduser -G robusta -g robusta -s /bin/sh -D robusta

RUN chown robusta:robusta /var/www/html