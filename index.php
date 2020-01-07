<?php

require 'system/functions.php';

$data['posts'] = get('posts');
$data['title'] = 'Home';

view('home', $data);