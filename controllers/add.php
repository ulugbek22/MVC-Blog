<?php

// =================================================================
//							ADD POST CONTROLLER
// =================================================================

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$data['post'] = $_POST;

	if (add($data['post'], 'posts')) echo "Post kiritildi!";
	else echo "Xatolik!";
}

$data['title'] = 'Add Post';

view('add', $data);