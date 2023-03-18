FROM php:8.1-apache

#####################
# Setup application #
#####################
WORKDIR /var/www/html

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

# Copy all of the source files into our image
COPY . ./

# Install composer dependencies
RUN composer install
RUN composer dump-autoload -o

# Run static code analysis
RUN ./vendor/bin/phpinsights analyse -v

# Install Node.js & NPM
RUN apt update
RUN apt install nodejs npm -y

RUN npm install

# Run tailwindcss
RUN npx tailwindcss -i ./tailwind.config.css -o ./public/assets/css/style.css

###################
# Run application #
###################

# Overwrite the default apache configuration with our own config
ADD ./docker/config-files/apache/default.conf /etc/apache2/sites-available/000-default.conf
ADD ./docker/config-files/apache/default.conf /etc/apache2/sites-enabled/000-default.conf

# Enable mod_rewrite
RUN a2enmod rewrite

EXPOSE 80
