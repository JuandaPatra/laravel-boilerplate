FROM php:8.2-apache

# enable apache rewrite
RUN a2enmod rewrite

# allow .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# install dependencies + composer
RUN apt-get update && apt-get install -y unzip git

# php extension
RUN docker-php-ext-install pdo pdo_mysql

# add composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
