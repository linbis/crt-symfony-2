FROM php:8.0-fpm-alpine

RUN apk add --no-cache \
    coreutils \
    gettext \
    php8-fpm \
    php8-pdo \
    php8-pdo_mysql \
    php8-session \
    make \
    curl &&\
    docker-php-ext-install pdo pdo_mysql

# Enable php8-xdebug if $PHP_XDEBUG_MODE is not empty
ARG PHP_XDEBUG_MODE=off
ARG PHP_XDEBUG_CLIENT_PORT=5902
ARG PHP_XDEBUG_CLIENT_HOST=host.docker.internal
COPY ./docker/php-fpm/xdebug.ini  /etc/php8/conf.d/xdebug.ini.template
RUN if [[ "$PHP_XDEBUG_MODE" != "" ]]; then \
        apk add --no-cache php8-pecl-xdebug; \
        export PHP_XDEBUG_MODE=$PHP_XDEBUG_MODE; \
        export PHP_XDEBUG_CLIENT_PORT=$PHP_XDEBUG_CLIENT_PORT; \
        export PHP_XDEBUG_CLIENT_HOST=$PHP_XDEBUG_CLIENT_HOST; \
        envsubst < /etc/php8/conf.d/xdebug.ini.template > /etc/php8/conf.d/xdebug.ini; \
    fi
RUN rm -f /etc/php8/conf.d/xdebug.ini.template

WORKDIR /var/www/crt_symfony_2/

COPY ./app/composer.json /var/www/crt_symfony_2/composer.json
COPY ./app/composer.lock /var/www/crt_symfony_2/composer.lock

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install

COPY ./docker/php-fpm/php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./docker/php-fpm/php-fpm.conf /usr/local/etc/php-fpm.conf


