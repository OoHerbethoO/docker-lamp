<?php

$config = file_get_contents(__DIR__ . "/../apache2/sites-enabled/000-default.conf");

$host = str_replace('.', '\.', $argv[1]);
$hosts = preg_match_all("~#VHOST " . $host . "$(.*)#ENDVHOST " . $host . "$~ms", $config, $matches);

$config = str_replace($matches[0], '', $config);
file_put_contents(__DIR__ . "/../apache2/sites-enabled/000-default.conf", $config);