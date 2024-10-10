# Используем официальный образ PHP 8.3
FROM php:8.3-fpm

# Установка необходимых PHP расширений и зависимостей
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Создаем директорию для приложения
WORKDIR /var/www

# Копируем файлы проекта в контейнер
COPY . .

# Устанавливаем зависимости Laravel
RUN composer install

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Копируем файл конфигурации PHP
COPY ./docker/php/php.ini /usr/local/etc/php/

EXPOSE 9000
CMD ["php-fpm"]
