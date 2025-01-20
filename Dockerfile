FROM php:8.2-fpm

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

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u 1000 -d /home/place_choose place_choose
RUN mkdir -p /home/place_choose/.composer && \
chown -R place_choose:place_choose /home/place_choose

WORKDIR /var/www/html

COPY . /var/www/html

COPY --chown=place_choose:place_choose . /var/www/html

USER place_choose

EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
