<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title><?= $title ?></title>
</head>
<body>

	<h1><a href="/<?= $url[1] ?>">MVC Blog</a></h1>

	<a href="/<?= $url[1] ?>/add">Add New Post</a>
	
	<?php require "{$page}.php" ?>
	
</body>
</html>