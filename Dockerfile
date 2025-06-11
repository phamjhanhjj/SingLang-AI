FROM php:8.2-apache

# Cài PHP extensions cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev curl \
    && docker-php-ext-install zip pdo pdo_mysql

# Bật mod_rewrite của Apache
RUN a2enmod rewrite

# Cài composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cài Laravel code
WORKDIR /var/www/html
COPY . .

# Đặt document root về public/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Cài thư viện PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Phân quyền cho Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
