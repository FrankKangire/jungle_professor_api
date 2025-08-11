# Use an official PHP image with an Apache server built-in
FROM php:8.2-apache

# --- FIX: Install system dependencies FIRST, then the PHP extension ---
# We need 'libpq-dev' to build the PostgreSQL driver.
# The '-y' flag automatically answers "yes" to any prompts.
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy your PHP application files from your computer into the container
COPY . /var/www/html/

# Enable Apache's rewrite module
RUN a2enmod rewrite