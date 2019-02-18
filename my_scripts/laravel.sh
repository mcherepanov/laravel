#!/bin/bash
# install laravel
apt-get update && apt-get upgrade -y
apt-get install curl mc php-cli php-gd php-mbstring php-mcrypt php-zip php-opcache php-xml  mysql-server php-mysql nginx php-fpm git -y

phpenmod mcrypt && service php7.0-fpm restart

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

mkdir -p /var/www/laravel
composer create-project laravel/laravel /var/www/laravel

chown -R www-data:www-data /var/www/laravel
chmod -R 775 /var/www/laravel/storage

cp default /etc/nginx/sites-available/default
service nginx restart

wget https://github.com/vrana/adminer/releases/download/v4.7.1/adminer-4.7.1.php
cp adminer-4.7.1.php /var/www/laravel/public/adminer.php

# база данных
mysql -uroot -e "CREATE DATABASE laravel"
# пользователь с паролем
mysql -uroot -e "CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'lara-pass'"
mysql -uroot -e "GRANT ALL PRIVILEGES ON * . * TO 'laravel'@'localhost'"
mysql -uroot -e "FLUSH PRIVILEGES"

# отредактировать /var/www/laravel/.env, вписать туда нужные данные для коннекта к базе
#DB_DATABASE=laravel
#DB_USERNAME=laravel
#DB_PASSWORD=lara-pass
# или сделать копирование этого файла с готовыми настройками

cd /var/www/laravel/
composer require barryvdh/laravel-debugbar --dev

# отредактировать /var/www/laravel/.env, вписать туда DEBUGBAR_ENABLED=true
# или сделать копирование этого файла с готовыми настройками

cp /root/.env /var/www/laravel/.env
