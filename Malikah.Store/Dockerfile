FROM php:7.2-apache

EXPOSE 80
EXPOSE 443

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update
RUN apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
RUN service apache2 restart
COPY / /var/www