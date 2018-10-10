
<?php 

	// Si hubo un registro exitoso, se obtiene la variable con GET
	if(isset($_GET["action"])){
		if ($_GET["action"] == "alumnoOk") {
			echo "<script> alert('Alumno registrado con éxito'); </script>";
		}else if($_GET["action"] == "alumnoError"){
			echo "<script> alert('ERROR->No se registró el alumno!'); </script>";
		}else if($_GET["action"] == "editadoOk"){
			echo "<script> alert('Cambios realizados con éxito!'); </script>";
		}else if($_GET["action"] == "editadoError"){
			echo "<script> alert('ERROR->No se actualizó el registro!'); </script>";
		}
	}
	

 ?>


<!-- Botón para agregar alumno -->

<!-- Todo está centrado el <center> cierra al final-->
<center>


<form method="POST" action="index.php?action=registroAlumno">
	<input type="submit" name="formulario" value="Nuevo Alumno">
</form>


<?php 

	/* MUESTRA LA TABLA CON LOS ALUMNOS Y UN BOTÓN PARA AGREGAR NUEVO ALUMNO */


	//Se crea un objeto del tipo controller
	$mvc = new controller();

	# TRAER TODOS LOS DATOS DE LO USUARIOS
	$tabla = $mvc->getAllController();
	

	// Si trajo por lo menos un registro
	if($tabla)
		$cont = count($tabla);
	else{
		$cont = 0;
		echo "<br><br>No hay registro de estudiantes";
	}
	
 ?>

 <br><br>
 <table border="3px">
 	<thead>
 		<th>Matricula</th>
 		<th>Nombre</th>
 		<th>Carrera</th>
 		<th>Situación académica</th>
 		<th>Email</th>
 		<th>Tutor</th>
 		<th>Foto</th>
 		<th>Ver</th>
 		<th>Editar</th>
 		<th>Eliminar</th>
 	</thead>
 	<tbody>
 		<?php 
 			// Se imprimen los datos de los alumnos
 			for($i=0; $i<$cont; $i++){
 				echo "<tr>";
 				echo "<td>" . $tabla[$i]["matricula"] . "</td>";
 				echo "<td>" . $tabla[$i]["nombre"] . "</td>";
 				echo "<td>" . $tabla[$i]["nombreCarrera"] . "</td>";
 				echo "<td>" . $tabla[$i]["situacionAcademica"] . "</td>";
 				echo "<td>" . $tabla[$i]["email"] . "</td>";
 				echo "<td>" . $tabla[$i]["nombreTutor"] . "</td>";
 				echo "<td>" . $tabla[$i]["foto"] . "</td>";

 				$matricula = $tabla[$i]["matricula"];
 		 ?>	
 		 		<!-- Botones para ver, editar y eliminar alumno -->
 		 		<td><a href="index.php?action=verAlumno&id=<?php echo($matricula); ?>"><button>Ver</button></a></td>

 		 		<td><a href="index.php?action=editarAlumno&id=<?php echo($matricula); ?>"><button>Editar</button></a></td>

 		 		<td><a href="index.php?action=eliminarAlumno&id=<?php echo($matricula); ?>"><button>Eliminar</button></a></td>
 		 		</tr>
 		 <?php 
 		 	} // Se cierra la llave del ciclo
 	     ?>
 	</tbody>
 </table>


 </center>



