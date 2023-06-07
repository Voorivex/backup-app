# Use the official PHP with Apache base image
FROM php:8.0-apache

# Copy the contents of the 'app' folder to the Apache document root
COPY app/ /var/www/html/

# Expose port 80 for web traffic
EXPOSE 80