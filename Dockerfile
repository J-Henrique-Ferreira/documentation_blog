FROM php:8.3-fpm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Limpa o cache do apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala e habilita a extensão Redis
RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

# Define o diretório de trabalho
WORKDIR /var/www

# Copia configuração personalizada do PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Copia o script de entrada e define permissões
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Define o entrypoint
ENTRYPOINT ["/entrypoint.sh"]
