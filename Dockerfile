FROM php:8.1-fpm

# Installer les dépendances SSL manquantes
RUN apt-get update && apt-get install -y libssl-dev

# Installer les autres extensions nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Copier votre application dans le conteneur
COPY . /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/html

# Exposer le port 80 pour PHP-FPM
EXPOSE 80

CMD ["php-fpm"]
