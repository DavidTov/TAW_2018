<?php 

	/*Registro de usuarios para acceder al CRUD de alumnos, tutores y carreras*/



	// Si se oprimió el botón de registro
	if (isset($_POST["registro"])) {

		// Se verifica que las contraseñas sean iguales
		if($_POST["password"] == $_POST["passwordConfirm"]){
			
			//Se crea un objeto del tipo controller
			$mvc = new controller();

			// Se manda llamar a una función que verifica si el usuario ya existe, si ya existe entonces el
			// registro no se podrá llevar a cabo
			if($mvc->usuarioRepetidoController()){
				// Se manda llamar al método del controlador para el registro de usuarios
				$mvc->registroUsuarioController();
			}

		}		
	}


	// Si la variable GET es "existe" muestra un alert correspondiente
	if(isset($_GET["action"])){
		if($_GET["action"] == "existe"){					
			echo "<script> alert('El usuario ingresado ya existe, intente con otro nombre de usuario.'); </script>";
		}
	}

 ?>

<!-- FORMULARIO PARA EL REGISTRO DE USUARIOS -->
<br>
 <center>
 	<h3> Registro de usuarios </h3>
 	<form method="POST">
 		<label>Usuario</label>
 		<input type="text" name="usuario" placeholder="Ingrese su nombre de usuario" required>
 		<br><br>

 		<label>Contraseña</label>
 		<input type="password" name="password" placeholder="Ingrese su contraseña" required>
 		<br><br>

 		<label>Confirmar contraseña</label>
 		<input type="password" name="passwordConfirm" placeholder="Confirmar contraseña" required>
 		<br><br>

 		<input type="submit" name="registro" value="Registrarse">

 	</form>
 	<br><br>
 	<a href="index.php?action=iniciarSesion">Ya tienes cuenta?, clic aquí</a>
 </center>