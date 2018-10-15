<?php 
	
	//Tomar la informacion que el usuario envia

	$nombre = $_POST["nombre"];

	// Se establece la cookie con los parámetros nombre, valor, tiempo de expiración
	setcookie("nombre", $nombre, time()+4800);


 ?>