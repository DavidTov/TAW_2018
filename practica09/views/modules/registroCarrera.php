<?php 
	
	# SE REGISTRA LA CARRERA

	// Se declara un objeto del tipo controller
	$mvc = new controller();

	// Se manda llamar al método del controller para registrar carrera si oprimió el botón
	if(isset($_POST["registrar"]))
		$mvc->registroCarreraController();

 ?>

 <!-- FORMULARIO PARA REGISTRAR LA CARRERA -->
<center>

	<h3>Registro de carreras</h3>

	<form method="POST">
		<label>Carrera</label>
		<input type="text" name="carrera" placeholder="Nombre de la carrera">

		<br><br>
		<input type="submit" name="registrar" value="Registrar carrera">
	</form>
</center>