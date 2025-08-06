# Use an official PHP image with an Apache server built-in
FROM php:8.2-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy your PHP application files from your computer into the container
COPY . /var/www/html/

# Enable Apache's rewrite module (useful for more advanced routing later)
RUN a2enmod rewrite

# Your container is now ready to run
