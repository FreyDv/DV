# Для начала указываем исходный образ, он будет использован как основа
FROM php:8.0-fpm

# RUN выполняет идущую за ней команду в контексте нашего образа.
# В данном случае мы установим некоторые зависимости и модули PHP.
# Для установки модулей используем команду docker-php-ext-install.
# На каждый RUN создается новый слой в образе, поэтому рекомендуется объединять команды.
RUN apt-get update && apt-get install -y \
        curl \
        vim \
        wget \
        git \
        libzip-dev \
    && docker-php-ext-install -j$(nproc)  mysqli pdo_mysql zip


# Куда же без composer'а.   curl
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN pecl install xdebug \
    &&docker-php-ext-enable xdebug
# Добавим свой php.ini, можем в нем определять свои значения конфигаcd
ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini
# Указываем рабочую директорию для PHP
WORKDIR /var/www

# Запускаем контейнер
# Из документации: The main purpose of a CMD is to provide defaults for an executing container. These defaults can include an executable,
# or they can omit the executable, in which case you must specify an ENTRYPOINT instruction as well.
CMD ["php-fpm"]