# Dockerfile for Deploying Laravel to Free Hosting (Render, Koyeb, Railway, Fly.io)
FROM php:8.3-cli-alpine

# Install system dependencies & PHP extensions
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite \
    sqlite-dev

RUN docker-php-ext-install pdo pdo_sqlite mbstring bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install dependencies & optimize
RUN composer install --no-dev --optimize-autoloader

# Create SQLite database if not exists
RUN touch database/database.sqlite
RUN chmod -R 777 storage bootstrap/cache database

# Expose port
EXPOSE 8000

# Start command: Migrate & Serve
CMD php artisan migrate --force --seed && php artisan serve --host=0.0.0.0 --port=8000
