<?php

require 'db.php';

function view($page, $data)
{
	global $url;
	
	extract($data);
	
	require 'views/layout.php';
}