FROM php:8.1.7-fpm-alpine as base
WORKDIR /var/www/html/
COPY --from=mlocati/php-extension-installer:1.5.29 /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions \
    mysqli \
    pdo_mysql \
    zip
COPY --from=composer:2.3.7 /usr/bin/composer /usr/local/bin/composer

FROM base as vendor
COPY composer.json .
COPY composer.lock .
RUN composer check-platform-reqs --quiet \
    && composer i --optimize-autoloader --no-scripts --quiet --no-ansi --no-interaction --no-progress --prefer-dist \
    && mv vendor vendor_test \
    && composer i --optimize-autoloader --no-scripts --quiet --no-dev --no-ansi --no-interaction --no-progress --prefer-dist

FROM base as production
RUN apk add --no-cache fcgiwrap \
    netcat-openbsd \
    procps \
    tini \
    && echo "pm.status_path = /status" >> /usr/local/etc/php-fpm.d/zz-docker.conf \
    && mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
ADD https://raw.githubusercontent.com/renatomefi/php-fpm-healthcheck/v0.5.0/php-fpm-healthcheck /usr/local/bin/
ADD https://github.com/eficode/wait-for/releases/download/v2.2.3/wait-for /usr/local/bin/
COPY docker/php/init.sh /usr/local/bin/init
RUN chmod u+x /usr/local/bin/php-fpm-healthcheck \
    && chmod u+x /usr/local/bin/wait-for \
    && chmod u+x /usr/local/bin/init
COPY --chown=www-data:www-data . .
COPY --from=vendor /var/www/html/vendor /var/www/html/vendor
RUN composer run post-autoload-dump --quiet --no-ansi --no-plugins \
    && rm /usr/local/bin/composer \
    && rm /usr/local/bin/install-php-extensions
ENTRYPOINT ["tini", "--"]
CMD ["init"]
