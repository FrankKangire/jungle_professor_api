# Use an official PHP image with an Apache server built-in
FROM php:8.2-apache

# --- FIX: Install the correct PostgreSQL driver (pdo_pgsql) ---
# PDO is the modern, standard way to connect to databases in PHP.
RUN apt-get update && docker-php-ext-install pdo pdo_pgsql

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy your PHP application files from your computer into the container
COPY . /var/www/html/

# Enable Apache's rewrite module
RUN a2enmod rewrite