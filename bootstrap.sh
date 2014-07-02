#!/usr/bin/env bash

sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password rootpass'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password rootpass'
sudo apt-get update
sudo apt-get -y install make mysql-server-5.5 php5-mysql php5-curl php5-dev php-pear apache2 php5 php5-gd

sudo pecl install xdebug

cp /vagrant/data/php.ini /etc/php5/apache2/php.ini
cp /vagrant/data/my.cnf /etc/mysql/my.cnf

sudo service apache2 restart

if [ ! -f /var/log/databasesetup ];
then
    echo "CREATE USER 'wordpressuser'@'localhost' IDENTIFIED BY 'wordpresspass'" | mysql -uroot -prootpass
    echo "CREATE DATABASE wordpress" | mysql -uroot -prootpass
    echo "GRANT ALL ON wordpress.* TO 'wordpressuser'@'localhost'" | mysql -uroot -prootpass
    echo "flush privileges" | mysql -uroot -prootpass
   
    touch /var/log/databasesetup

    if [ -f /vagrant/data/wordpress.sql ];
    then
        mysql -uroot -prootpass wordpress < /vagrant/data/wordpress.sql
    fi
    
fi

if [ ! -h /var/www ]; 
then 

    rm -rf /var/www sudo 
    ln -s /vagrant/public /var/www

    a2enmod rewrite

    sed -i '/AllowOverride None/c AllowOverride All' /etc/apache2/sites-available/default

    service apache2 restart
fi


#Make wp-content default folders and make upload folder writable by server
if [ ! -h /var/www/wp-content ];
then

    cp -r /var/www/wordpress/wp-content /var/www/wp-content

    chown -R vagrant:vagrant /var/www/wp-content

    mkdir /var/www/wp-content/uploads

    chown -R www-data:www-data /var/www/wp-content/uploads

fi