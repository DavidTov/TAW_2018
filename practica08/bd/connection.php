<?php

	//$dsn = 'mysql:dbname=php_jugadores;host=localhost;';
	$dsn = 'mysql:dbname=php_sql_course;host=localhost;';
	$user = 'root';
	$password = '';

	try{
		$pdo = new PDO($dsn, $user, $password);
	}catch( PDOException $e ){
		echo 'Error al conectarnos: ' . $e->getMessage();
	}


	//id, usuario, password
?>