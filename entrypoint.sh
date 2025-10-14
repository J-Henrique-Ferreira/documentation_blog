#!/bin/bash

# Corrige permissões
# chmod -R 775 storage bootstrap/cache
# chown -R www-data:www-data storage bootstrap/cache

# Cria o link simbólico do storage
php artisan storage:link || true

# Inicia o PHP-FPM
exec php-fpm

# Rodar o storage:link uma vez
php artisan storage:link || true

# Iniciar o PHP-FPM ou o comando principal
php-fpm
