<?php

require 'system/functions.php';

$url = explode('/', $_SERVER['REQUEST_URI']);

$controller = $url[2] ? $url[2] : 'home';

print_r($controller); die();