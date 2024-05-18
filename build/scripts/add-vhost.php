<?php

$config = file_get_contents(__DIR__ . "/../apache2/sites-enabled/000-default.conf");
$HOST = $argv[1];
$DIR = $argv[2];
$PHP = $argv[3];
$tpl = "
#VHOST $HOST
<VirtualHost *:80>
    ServerName $HOST
    DocumentRoot /var/www/html/$DIR
    <FilesMatch \.php$>
      SetHandler 'proxy:unix:/run/php/php{$PHP}-fpm.sock|fcgi://localhost'
    </FilesMatch>
</VirtualHost>
#ENDVHOST $HOST
";

$config .= $tpl;

file_put_contents(__DIR__ . "/../apache2/sites-enabled/000-default.conf", $config);