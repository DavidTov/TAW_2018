<?php 

	

	// Si se oprimió el botón de Iniciar sesión
	if(isset($_POST["iniciarSesion"])){
		// Crear un objeto del tipo controller
		$mvc = new controller();

		// Se manda llamar el método para iniciar sesión
		$mvc->sesionController();
	}



	// Si se registró un usuario con éxito se coloca el alert correspondiente
	if(isset($_GET["action"])){
		if($_GET["action"] == "ok"){
			echo "<script> alert('Usuario registrado con éxito'); </script>";
		} 
		// Sino si se ingresaron datos incorrectos (contraseña o nombre de usuario)
		else if($_GET["action"] == "sesionError"){			
			echo "<script> alert('Usuario o contraseña incorrectos!'); </script>";	
		}
	}
 ?>

 <!-- FORMULARIO PARA INICIAR SESION -->

<br>
 <center>
 	<h3>Iniciar sesión</h3>
 	<form method="POST">
 		<label>Usuario</label>
 		<input type="text" name="usuario" placeholder="Nombre de usuario" required>
 		<br><br>

 		<label>Contraseña</label>
 		<input type="password" name="password" placeholder="Ingrese la contraseña" required>
 		<br><br>

 		<input type="submit" name="iniciarSesion" value="Iniciar sesión">
 	</form>
 	<br><br>
 	<a href="index.php?action=registroUsuarios">No tienes cuenta?, Registrate aquí</a>
 </center>