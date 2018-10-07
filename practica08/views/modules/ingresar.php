<h1> INGRESAR </h1>

<!-- FORMULARIO PARA INGRESAR -->
<form method="POST">
	<input type="text" name="usuarioIngreso" placeholder="Nombre de usuario">

	<input type="password" name="passwordIngreso" placeholder="Contraseña">

	<input type="submit" value="Ingresar" name="ingresar">

</form>


<?php 
	
	
	// Se declara un objeto del tipo MvcController()
	$ingreso = new MvcController();

	// Se trae la variable action despues de un registro, si es ok se muestra el mensaje
	if(isset($_GET["action"])){
		if($_GET["action"] == "ok"){
			// script JS
			echo "<script> alert('Usuario registrado con éxito!') </script>";
		}
	}

	// Si se oprimió el botón de ingresar
	if(isset($_POST["ingresar"])){
		// se guardan los valores de POST
		$usuario = $_POST["usuarioIngreso"];
		$contrasena = $_POST["passwordIngreso"];

		// Se manda llamar al método del controlador para ingresar o iniciar sesión
		// Si los datos de ingreso son correctos se reedirige al index.php?action=cambio
		$ingreso->ingresoUsuarioController($usuario, $contrasena);
	}



 ?>