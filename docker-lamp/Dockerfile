# Usa la imagen oficial de PHP con Apache
FROM php:8.0-apache

# Instalar las extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite de Apache (necesario para algunas aplicaciones PHP)
RUN a2enmod rewrite
RUN apt-get update && apt-get install -y \
    unzip \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

# Copiar todos los archivos de la app PHP al contenedor
COPY ./www /var/www/html

# Cambiar la raíz del documento de Apache a /var/www/html/public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Establecer permisos apropiados para la carpeta de la app
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Permitir el uso de .htaccess en la configuración de Apache
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Agregar directiva Directory para permitir acceso a /var/www/html/public
RUN echo "<Directory /var/www/html/public>\n    Options Indexes FollowSymLinks\n    AllowOverride All\n    Require all granted\n</Directory>" >> /etc/apache2/apache2.conf

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache en primer plano
CMD ["apache2-foreground"]
