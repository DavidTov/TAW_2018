<?php 

	// Si se oprimió el botón de editar en la tabla de alumnos, con GET obtiene el id
	if(isset($_GET["id"])){
		// Se crea un objeto del tipo controller
		$mvc = new controller();

		// Se llama al método del controller para obtener un registro con todos sus campos
    	// get controller sobrecarga del método
		$alumno = $mvc->getAllController($_GET["id"]);    	
	}
	

 ?>
<br>

<!-- DATOS DEL ALUMNO CENTRADOS -->
 <center>
 	<label>Matricula: <?php echo $alumno["matricula"]; ?></label>
 	<br><br>
 	
 	<label><strong>Nombre: </strong><?php echo $alumno["nombre"]; ?></label>
 	<br><br>

 	<label><strong>Carrera: </strong><?php echo $alumno["nombreCarrera"]; ?></label>
 	<br><br>

 	<label><strong>Situación académica: </strong> <?php echo $alumno["situacionAcademica"]; ?></label>
 	<br><br>

 	<label><strong>Email: </strong><?php echo $alumno["email"]; ?></label>
 	<br><br>

 	<label><strong>Tutor: </strong><?php echo $alumno["nombreTutor"]; ?></label>
 	<br><br>

 	<label><strong>Foto: </strong><?php echo $alumno["foto"]; ?></label>
 	<br><br> 	
 </center>