# Use an official PHP runtime as base image
FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set file permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose Laravel's default HTTP port (8000)
EXPOSE 8000

# Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
