FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libpq-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd pdo_pgsql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u 1000 -d /home/place_choose place_choose
RUN mkdir -p /home/place_choose/.composer && \
chown -R place_choose:place_choose /home/place_choose

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html

# Copy existing application directory permissions
COPY --chown=place_choose:place_choose . /var/www/html

# Change current user to it_laravel
USER place_choose

# Expose port 8000 and start PHP server
EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
