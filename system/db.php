<?php

require 'config.php';

function connect($config)
{
	try {
		$conn = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}",
						$config['user'], $config['password']);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	} catch (PDOException $e) { 
		echo "DB error: {$e->getMessage()}"; 
		die(); 
	}
}

$conn = connect($config);

function query($sql, $id = false, $bindings = false)
{
	global $conn;

	if ($id) {

		$result = $conn->prepare($sql);
	
		$result->bindParam(':id', $id, PDO::PARAM_INT);
	
		$result->execute();
	
		return $result->fetchAll(PDO::FETCH_ASSOC);
	
	} elseif ($bindings) {

		$result = $conn->prepare($sql);

		$result->execute($bindings);

		return $conn->lastInsertId();

	} else $result = $conn->query($sql);

	return $result->fetchAll(PDO::FETCH_ASSOC);
}

function get($table, $id = false, $limit = 15)
{
	if ($id) return query("SELECT * FROM $table WHERE id = :id", $id)[0];

	else return query("SELECT * FROM $table ORDER BY id DESC LIMIT $limit");
}

function add($data, $table)
{
	foreach ($data as $key => $val) {
		@$keys .= "$key, ";
		@$vals .= ":$key, ";
	}
	$keys = preg_replace('/, $/', '', $keys);
	$vals = preg_replace('/, $/', '', $vals);

	return query("INSERT INTO $table ($keys) VALUES ($vals)", false, $data);
}