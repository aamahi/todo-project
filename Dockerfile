FROM php:7.4-fpm

#FROM php:7.4-fpm
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libonig-dev \
        zip \
        unzip

RUN apt-get update && \
      apt-get -y install sudo

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Installing Node Dependencies
RUN rm -rf /var/lib/apt/lists/ && curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt-get install nodejs -y


# Permission related
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g sudo www
RUN echo 'www:1234' | chpasswd

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

RUN chown -R www:www /var/www/storage
RUN mkdir -p /home/www/.composer && \
    chown -R www:www /home/www


# Change current user to www
USER www
