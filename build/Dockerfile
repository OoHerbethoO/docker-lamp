FROM ubuntu

RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/*

RUN apt-get update -y
RUN apt-get install software-properties-common -y
RUN apt-get update
RUN apt-get install -y locales locales-all && export LC_ALL=en_US.UTF-8 && export LANG=en_US.UTF-8

RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/apache2
RUN apt-get update -y

RUN apt install -y wget cpanminus iproute2
RUN apt-get install -y php5.6 php5.6-fpm php5.6-mysql php5.6-mbstring libapache2-mod-php5.6 libapache2-mod-fcgid
RUN apt-get install -y php7.0 php7.0-fpm php7.0-mysql php7.0-mbstring php7.0-xml php7.0-bcmath php7.0-curl php7.0-gd libapache2-mod-php7.0
RUN apt-get install -y php7.1 php7.1-fpm php7.1-mysql php7.1-mbstring php7.1-xml php7.1-bcmath php7.1-curl php7.1-gd libapache2-mod-php7.1
RUN apt-get install -y php7.2 php7.2-fpm php7.2-mysql php7.2-mbstring php7.2-xml php7.2-bcmath php7.2-curl php7.2-gd libapache2-mod-php7.2
RUN apt-get install -y php7.3 php7.3-fpm php7.3-mysql php7.3-mbstring php7.3-xml php7.3-bcmath php7.3-curl php7.3-gd libapache2-mod-php7.3
RUN apt-get install -y php7.4 php7.4-fpm php7.4-mysql php7.4-mbstring php7.4-xml php7.4-bcmath php7.4-curl php7.4-gd php7.4-pgsql libapache2-mod-php7.4
RUN apt-get install -y php8.0 php8.0-fpm php8.0-mysql php8.0-mbstring php8.0-xml php8.0-bcmath php8.0-curl php8.0-gd php8.0-pgsql libapache2-mod-php8.0
RUN apt-get install -y php8.1 php8.1-fpm php8.1-mysql php8.1-mbstring php8.1-xml php8.1-bcmath php8.1-curl php8.1-gd php8.1-pgsql libapache2-mod-php8.1
RUN apt-get install -y php8.2 php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-bcmath php8.2-curl php8.2-gd php8.2-pgsql libapache2-mod-php8.2
RUN apt-get install -y php8.3 php8.3-fpm php8.3-mysql php8.3-mbstring php8.3-xml php8.3-bcmath php8.3-curl php8.3-gd php8.3-pgsql libapache2-mod-php8.3

RUN echo "deb http://download.webmin.com/download/repository sarge contrib" >> /etc/apt/sources.list
RUN wget -q -O- http://www.webmin.com/jcameron-key.asc | apt-key add
RUN apt-get update
RUN apt-get install -y apache2
RUN apt-get install -y webmin --install-recommends
RUN a2enmod rewrite actions fcgid alias proxy_fcgi

#RUN sed -ri -e 's!/var/www/html!/var/www/html!g' /etc/apache2/sites-available/*.conf
#RUN sed -ri -e 's!/var/www/!/var/www/html!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
#RUN chown -R www-data:www-data /var/log/apache2/

COPY apache2/php/5.6/php.ini /etc/php/5.6/fpm/php.ini
COPY apache2/php/7.0/php.ini /etc/php/7.0/fpm/php.ini
COPY apache2/php/7.1/php.ini /etc/php/7.1/fpm/php.ini
COPY apache2/php/7.2/php.ini /etc/php/7.2/fpm/php.ini
COPY apache2/php/7.3/php.ini /etc/php/7.3/fpm/php.ini
COPY apache2/php/7.4/php.ini /etc/php/7.4/fpm/php.ini
COPY apache2/php/8.0/php.ini /etc/php/8.0/fpm/php.ini

RUN rm -rf /etc/apache2/mods-enabled
RUN ln -sf /etc/apache2/mods-available /etc/apache2/mods-enabled
RUN rm -rf /etc/apache2/mods-enabled/php7*
RUN rm -rf /etc/apache2/mods-enabled/php8*
RUN rm -rf /etc/apache2/mods-enabled/mpm_event* /etc/apache2/mods-enabled/mpm_worker*

ADD apache2/entrypoint.sh /usr/local/bin/entrypoint.sh
ENTRYPOINT ["sh", "/usr/local/bin/entrypoint.sh"]