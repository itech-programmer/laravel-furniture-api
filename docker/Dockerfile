# Используем PHP 8.3 + FPM
FROM php:8.3-fpm

# Установка необходимых пакетов и PHP-расширений
RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем файлы приложения в контейнер
WORKDIR /var/www
COPY . .

# Установка зависимостей Laravel
RUN composer install

# Копируем файл конфигурации Nginx
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Установка прав доступа для Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Открываем порт 80
EXPOSE 80

# Запуск PHP-FPM и Nginx
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
