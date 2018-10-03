<?php 

	include "db/database_utilities.php";

	echo "Registro de alumnos <br><br>";	

	if(isset($_POST["registro"])){
		$nombreTutor = $_POST["tutor"];
		$carrera = $_POST["carrera"];
		$nombreAlumno = $_POST["nombre"];
		$matricula = $_POST["matricula"];

		// Se verifica si la matricula existe
		$check = verificarMatricula($matricula);
		if(!$check){
			echo "<script>alert('La matricula ya existe o se ingresaron datos erróneos')</script>";
			echo "<a href='index.php'> Inicio </a>";
			exit();

		}

		$registrar = registrarAlumno($matricula, $nombreAlumno, $carrera, $nombreTutor);
		if($registrar){
			echo "Exito";
		}else{
			echo "<script> alert('Ups! no se agregó, vuelve a intentarlo ') </script>";
		}
		
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title> Regitro de alumnos </title>
 </head>
 <body>

 	<form action="registrar_alumno.php" method="POST">
 		<label>Matricula</label>
 		<input type="text" name="matricula" placeholder="Ingresar matricula" required>
 		<br><br>
 		<label>Nombre</label>
 		<input type="text" name="nombre" placeholder="Nombre completo" required>
 		<br><br>

 		<?php 
 			$res = seleccionarCarrera();
 			$cont = count($res);
 		 ?>

 		 <label>Seleccionar carrera</label>
 		<select name="carrera" required> 			 				 		
 			<?php 
 				for($i=0; $i<$cont; $i++){
 					echo "<option>";
 					echo $res[$i]["nombreCarrera"];
 					echo "</option>";
 				}
 			 ?>
 		</select>
 		<br><br>


 		<?php 
 			$res = seleccionarTutor();
 			$cont = count($res);
 		 ?>

 		<label>Seleccionar tutor</label>
 		<select name="tutor" required>
 			<?php 
 				for($i=0; $i<$cont; $i++){
 					echo "<option>";
 					echo $res[$i]["nombreTutor"];
 					echo "</option>";
 					$id_tutor = $res[$i]["id"];				
 				}
 			 ?>
 		</select>
 		<br><br>
 		<input type="submit" name="registro" value="Registrar alumno">
 	</form>
 	<br><br>
 	<a href="index.php"> Inicio </a>
 </body>
 </html>