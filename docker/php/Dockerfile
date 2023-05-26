FROM debian:11

RUN apt-get update && \
    apt-get install -y lsb-release ca-certificates apt-transport-https software-properties-common gnupg2 wget git && \
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/sury-php.list && \
    wget -qO - https://packages.sury.org/php/apt.gpg | apt-key add - && \
    apt-get update && \
    apt-get -y install php8.0 php8.0-fpm php8.0-bcmath php8.0-bz2 php8.0-curl php8.0-dom php8.0-gd php8.0-gmp php8.0-mbstring php8.0-zip php8.0-mysql php8.0-xdebug php8.0-pgsql && \
    mkdir -p /var/run/php && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \ 
    mv composer.phar /usr/local/bin/composer

EXPOSE 9000

CMD ["php-fpm8.0", "-F", "-R"]
