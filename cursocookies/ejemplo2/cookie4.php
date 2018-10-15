<?php 
	// Contar numero de veces que nos visite un usuario

	if(isset($_COOKIE["contador"])){
		setcookie("contador", $_COOKIE["contador"]+1, time()+365*24*60*60);
		echo "Número de visitas: " . $_COOKIE["contador"];
	}else{
		setcookie("contador", 1, time()+365*24*60*60);
		echo "Bienvenido por primera vez a nuestra página";
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Ejercicio cookie 4</title>
 	<meta charset="utf-8">
 </head>
 <body>
 
 </body>
 </html>