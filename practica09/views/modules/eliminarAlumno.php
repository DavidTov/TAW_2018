<?php 

	
	// Si se oprimió el botón de eliminar en la tabla de alumnos
	if(isset($_GET["action"])){
		if($_GET["action"] == "eliminarAlumno"){
			// Se crea un objeto del tipo controller
			$mvc = new controller();

			// Se manda llamar el método del cotroller para eliminar un alumno
			if($mvc->eliminarAlumnoController());
		}
	}	

 ?>

