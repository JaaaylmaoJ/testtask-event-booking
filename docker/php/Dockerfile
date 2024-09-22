FROM php:8.2-fpm-alpine3.19

WORKDIR /var/www/html

ADD  https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions  /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions && sync \
 && apk add -X https://dl-cdn.alpinelinux.org/alpine/v3.16/main -u alpine-keys \
 && apk --no-cache add shadow su-exec git openssh-client


RUN install-php-extensions \
  ffi \
  apcu \
  opcache \
  memcached \
  zip \
  bcmath \
  intl \
  mbstring \
  curl

# Install composerred
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --version=2.7.0 \
    --install-dir=/usr/bin

RUN install-php-extensions xdebug

# Cleanup apk cache
RUN rm -rf /var/cache/apk/* \
 && rm -rf /tmp/*

CMD ["php-fpm"]