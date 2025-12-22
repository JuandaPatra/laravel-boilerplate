FROM docker.io/library/composer:2 AS composer

FROM php:8.2-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Allow .htaccess
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Install system dependencies
RUN apt-get update && \
    apt-get install -y unzip git nano curl && \
    rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy composer files dulu
COPY src/composer.json src/composer.lock ./


# Copy semua source Laravel (termasuk artisan, bootstrap, app, config, helpers, dll)
COPY src/. .
# Copy helper terlebih dahulu (supaya autoload tidak gagal)
# COPY src/artisan ./
# COPY src/app/Helpers/Helpers.php app/Helpers/Helpers.php

# Copy composer binary dari stage sebelumnya
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install dependencies / dump-autoload
RUN composer install --no-dev --optimize-autoloader
# atau jika sudah install di host, bisa pakai dump-autoload saja
# RUN composer dump-autoload

# Copy semua source Laravel, termasuk Helpers
# COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 80

# Default command
CMD ["apache2-foreground"]
