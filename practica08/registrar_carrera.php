<?php 

	include "db/database_utilities.php";

	echo "Registro de carreras <br><br>";

	if(isset($_POST["registrar"])){
		registrarCarrera($_POST["nombreCarrera"]);
		echo "HOLA";
	}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title> Registro carreras </title>
 </head>
 <body>
 	<form action="registrar_carrera.php" method="POST">
 		<label>Nombre de la carrera</label>
 		<input type="text" name="nombreCarrera" required>

 		<br>
 		<input type="submit" name="registrar" value="Registrar">
 	</form>
 </body>
 </html>