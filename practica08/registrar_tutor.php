<?php 

	include "db/database_utilities.php";


	echo "Registro de tutores <br><br>";

	if (isset($_POST["registro"])) { //Se dio clic en el botón
		$nombreTutor = (string)$_POST["nombreTutor"]; // se almacena el nombre

		$carrera = (string)$_POST["select"]; // se almacena la carrera 


		// Se le asigna valor booleano a $res para saber si se agregaron o no los datos
		// Y se ejecuta la función para registrar tutor
		$res = registrarTutor($nombreTutor, $carrera);
		
		if($res){
			echo "<script> alert('Datos agregados correctamente'); </script>";
		}else{
			echo "<script> alert('ERROR: No se agregaron los datos!!'); </script>";
		}
	}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title> Registro tutor </title>
 </head>
 <body>


 	<?php // Se almacena en $res lo que devuelva la función ?>
 	<?php $res = seleccionarCarrera(); // función que devuelve los nombres de las carreras 
 	$cont = count($res); // Se cuentan el total de registros 
 	?>
 	<form action="registrar_tutor.php" method="POST">
 		<label>Nombre </label>
 		<input type="text" name="nombreTutor" placeholder="nombre tutor" required>


 		<br><br><label>Carrera</label>
 		<select name="select">
 			<?php
 				//Se muestran los nombres de las carreras 
 				for($i=0; $i<$cont; $i++) {
 					echo "<option>";	
 					echo $res[$i]["nombreCarrera"];
 					echo "</option>";
 				}

 			 ?>
 		</select>

 		<!-- Botón de registro-->
 		<br><br><input type="submit" name="registro" value="Registrar tutor">
 	</form>
 	<br><br>
 	<a href="index.php"> Inicio </a>
 </body>
 </html>