FROM php:8.5-fpm-alpine

RUN apk update && apk upgrade
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY php.ini $PHP_INI_DIR/conf.d/php.ini
