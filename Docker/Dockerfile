# Use the PHP-FPM 8.2 image
FROM php:8.2-fpm

## Copy composer.lock and composer.json
#COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www




ENV NODE_VERSION=20.9.0

RUN apt install -y curl
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash
ENV NVM_DIR=/root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install $NODE_VERSION
RUN . "$NVM_DIR/nvm.sh" && nvm use v$NODE_VERSION
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v$NODE_VERSION
ENV PATH="/root/.nvm/versions/node/v$NODE_VERSION/bin/:${PATH}"

# Install the necessary software and libraries
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libpq-dev \
    git \
    zip \
    unzip \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install the required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql bcmath
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd

# Install xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# # Copy existing application directory permissions
# COPY --chown=www:www . /var/www

# # Change current user to www
# USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
