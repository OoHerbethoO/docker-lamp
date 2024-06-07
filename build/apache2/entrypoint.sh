#!/bin/sh

DOC_ROOT="/var/www/html"
#chown -R www-data:www-data "$DOC_ROOT"

service php5.6-fpm start
service php7.0-fpm start
service php7.1-fpm start
service php7.2-fpm start
service php7.3-fpm start
service php7.4-fpm start
service php8.0-fpm start
service php8.1-fpm start
service php8.2-fpm start
service php8.3-fpm start

service apache2 restart
service webmin restart

timedatectl set-timezone America/Sao_Paulo

tail -f /dev/null