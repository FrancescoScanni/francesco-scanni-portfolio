FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite

COPY . /var/www/html/

# dragging document route to the "app" folder, where index is located, so that the app can be accessed via the root URL
RUN sed -i 's|/var/www/html|/var/www/html/app|g' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80