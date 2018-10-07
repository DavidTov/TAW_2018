<?php 

	include "db/database_utilities.php";

	echo "Registro de carreras <br><br>";

	if(isset($_POST["registrar"])){
		// se cambia la carrera a mayúsculas, incluyendo las letras con acentos
		$carrera = mb_strtoupper($_POST["nombreCarrera"]);
		registrarCarrera($carrera);
		echo "<script> alert('Datos guardados con éxito'); </script>";
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
 		<input type="text" name="nombreCarrera" placeholder="Ingresar carrera" required>

 		<br>
 		<input type="submit" name="registrar" value="Registrar">
 	</form>
 	<br><br>
 	<a href="index.php"> Inicio </a>
 </body>
 </html>