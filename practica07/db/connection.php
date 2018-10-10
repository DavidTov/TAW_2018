<?php

	$dsn = 'mysql:host=localhost;dbname=alumnos_y_tutores;';
	$user = 'root';
	$password = '';

	try{
		$pdo = new PDO($dsn, $user, $password);
		$pdo->exec("SET CHARACTER SET utf8");		
	}catch( PDOException $e ){
		echo 'Error al conectarnos: ' . $e->getMessage();		
	}
?>