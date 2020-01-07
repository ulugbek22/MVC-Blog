<?php

require 'db.php';

function view($page, $data)
{
	extract($data);
	
	require 'views/layout.php';
}