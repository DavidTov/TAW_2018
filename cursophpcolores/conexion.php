<?php 

	$link = "mysql:host=localhost;dbname=yt_colores";
	$usuario = "root";
	$password = "";

	try{
		$pdo = new PDO($link, $usuario, $password);	
	}catch(PDOException $e){
		echo "ERROR! " . $e->getMessage() . "<br>";
		die();
	}

 ?>

