# -*- mode: ruby -*-
# vi: set ft=ruby :


Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.network "forwarded_port", guest: 8000, host: 8080

  config.vm.synced_folder "data", "/var/www/html"

  config.vm.provider "virtualbox" do |v|
    v.memory = 2048
  end


  config.vm.provision "shell", inline: <<-SHELL
     apt-get update
     sudo apt-get install -y python-software-properties
     sudo add-apt-repository ppa:ondrej/php
     apt-get upgrade
     apt-get update
     debconf-set-selections <<< 'mysql-server mysql-server/root_password password 0000'
     debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password 0000'
     apt-get install -y apache2 php7.1 php7.1-zip git zsh mysql-server php7.1-cli  php7.1-opcache php7.1-common libapache2-mod-php php7.1-mysql php7.1-xml libapache2-mod-php7.1 php7.1-curl php7.1-json php7.1-gd php7.1-mcrypt php7.1-msgpack php7.1-memcached php7.1-intl php7.1-sqlite3 php7.1-gmp php7.1-geoip php7.1-mbstring php7.1-redis php7.1-zip libcurl3 libssl1.1
     sh -c "$(curl -fsSL https://raw.github.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"
     chsh -s /bin/zsh
     sed "s/APACHE_RUN_GROUP=www-data/APACHE_RUN_GROUP=ubuntu/" /etc/apache2/envvars > temporary
     sed "s/APACHE_RUN_USER=www-data/APACHE_RUN_USER=ubuntu/" temporary > /etc/apache2/envvars
     rm temporary
     cd /var/www/html
     mysql --user="root" --password="0000" --database="mysql" --execute="CREATE USER 'symfony'@'127.0.0.1';"
     mysql --user="root" --password="0000" --database="mysql" --execute="CREATE USER 'symfony'@'localhost';"
     mysql --user="root" --password="0000" --database="mysql" --execute="CREATE DATABASE symfony;"
     mysql --user="root" --password="0000" --database="mysql" --execute="GRANT ALL ON *.* TO 'symfony'@'127.0.0.1';"
     mysql --user="root" --password="0000" --database="mysql" --execute="GRANT ALL ON *.* TO 'symfony'@'localhost';"
     mysql --user="root" --password="0000" --database="mysql" --execute="FLUSH PRIVILEGES;"


     php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
     php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
     php composer-setup.php --install-dir=/bin --filename=composer
     php -r "unlink('composer-setup.php');"
     composer install
     cd /var/www/html
     php bin/console doctrine:schema:create
     php bin/console doctrine:schema:update --force
     php bin/console doctrine:fixtures:load



  SHELL
end