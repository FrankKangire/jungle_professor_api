# Use an official PHP image with an Apache server built-in
FROM php:8.2-apache

# --- NEW: Install system dependencies AND the postgresql client tool ---
# We need 'libpq-dev' to build the PHP driver.
# We need 'postgresql-client' to get the 'psql' command-line tool.
RUN apt-get update && apt-get install -y libpq-dev postgresql-client && docker-php-ext-install pdo pdo_pgsql

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy your PHP application files from your computer into the container
COPY . /var/www/html/

# Enable Apache's rewrite module
RUN a2enmod rewrite