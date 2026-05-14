# Usamos una imagen optimizada para Laravel
FROM richarvey/nginx-php-fpm:latest

# Copiamos todo el código de nuestro proyecto al servidor
COPY . .

# Copiamos la configuración personalizada de Nginx para Laravel
COPY conf/ /etc/nginx/

# Configuración de Laravel para Render
ENV SKIP_COMPOSER 0
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1

# Instalamos dependencias de PHP
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Instalar Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Instalar dependencias de Node y compilar assets
RUN npm install && npm run build

# Damos permisos a las carpetas necesarias
RUN chmod -R 775 storage bootstrap/cache

# Exponemos el puerto que usa la imagen
EXPOSE 80

# El comando de inicio que ya conocemos
CMD ["sh", "-c", "php artisan migrate --force && php artisan storage:link && /start.sh"]
