# Use the official PHP with Apache base image
FROM php:apache

# Copy the contents of the 'app' folder to the Apache document root
COPY app/ /var/www/html/

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set the document root for Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update the default Apache configuration to use the new document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install any necessary PHP extensions or dependencies
# RUN docker-php-ext-install <extension-name>

# Run any additional commands for building the application
# RUN composer install

# Expose port 80 for web traffic
EXPOSE 80