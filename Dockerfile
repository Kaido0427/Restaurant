# Utiliser une image PHP officielle
FROM php:8.1-fpm

# Installer les extensions nécessaires
RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libpng-dev libjpeg-dev libpng-dev libssl-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier le contenu du projet dans le conteneur
COPY . /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/html

# Installer les dépendances
RUN composer install

# Exposer le port 80
EXPOSE 80

# Commande pour démarrer PHP-FPM
CMD ["php-fpm"]
