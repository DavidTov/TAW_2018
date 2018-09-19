<?php

	$dsn = 'mysql:host=localhost;dbname=php_sql_course;';
	$user = 'root';
	$password = '';

	try{
		$pdo = new PDO($dsn, $user, $password);
		$pdo->exec("SET CHARACTER SET utf8");		
	}catch( PDOException $e ){
		echo 'Error al conectarnos: ' . $e->getMessage();		
	}
?>