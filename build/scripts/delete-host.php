<?php

$hosts = file_get_contents("/etc/hosts");

preg_match_all("~\n127\.0\.0\.1.*?$argv[1]$~", $hosts, $matches);
$hosts = str_replace($matches[0], "", $hosts);

file_put_contents("/etc/hosts", $hosts);