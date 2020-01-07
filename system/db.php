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

function query($conn, $sql, $id = false)
{
	if ($id) {

		$result = $conn->prepare($sql);
	
		$result->bindParam(':id', $id, PDO::PARAM_INT);
	
		$result->execute();
	
		return $result->fetchAll(PDO::FETCH_ASSOC);
	
	} else $result = $conn->query($sql);

	return $result->fetchAll(PDO::FETCH_ASSOC);
}

function get($table, $id = false, $limit = 5)
{
	global $conn;

	if ($id) return query($conn, "SELECT * FROM $table WHERE id = :id", $id)[0];

	else return query($conn, "SELECT * FROM $table LIMIT $limit");
}