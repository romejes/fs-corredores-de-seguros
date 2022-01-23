ARG PHP_VERSION
FROM php:${PHP_VERSION}-fpm

WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    mariadb-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set locale
RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y locales \
    && sed -i -e 's/# es_PE.UTF-8 UTF-8/es_PE.UTF-8 UTF-8/' /etc/locale.gen \
    && dpkg-reconfigure --frontend=noninteractive locales \
    && update-locale LANG=es_PE.UTF-8
ENV LANG es_PE.UTF-8  
ENV LANGUAGE es_PE:es
ENV LC_ALL es_PE.UTF-8   

# Install PHP CodeSniffer
RUN curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar && \
    cp /var/www/html/phpcs.phar /usr/local/bin/phpcs && \
    chmod +x /usr/local/bin/phpcs

# Set default values for phpcs
RUN /usr/local/bin/phpcs --config-set show_progress 1 && \
    /usr/local/bin/phpcs --config-set colors 1 && \
    /usr/local/bin/phpcs --config-set report_width 140 && \
    /usr/local/bin/phpcs --config-set encoding utf-8

# Change permissions
ADD . /var/www/html
RUN chown -R www-data:www-data /var/www/html

# Add user for laravel application
RUN groupadd -g 1000 devgroup
RUN useradd -u 1000 -ms /bin/bash -g devgroup jesus

# Change current user to www
USER jesus

# Copy PHP ini file
COPY php.ini /usr/local/etc/php/

EXPOSE 9000

CMD ["php-fpm"]
