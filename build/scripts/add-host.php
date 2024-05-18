<?php

$hosts = file_get_contents("/etc/hosts");

$hosts .= "\n127.0.0.1 " . $argv[1];

file_put_contents("/etc/hosts", $hosts);