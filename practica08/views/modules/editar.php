<?php 
	
	// Se crea un objeto del tipo MvcController
	$mvc = new MvcController();
	
	// Se guarda con GETel id del regitro a editar
	if(isset($_GET["id"])){
		$id = $_GET["id"];

		// Se traen todos los datos del usuario
		$usuario = $mvc->getUsuarioController();
	}

	
	// Si se oprimió el botón para editar al usuario
	if(isset($_POST["editar"])){
		// Se evalúa si la contraseña del usuario en sesión es correcta
		if($_SESSION["password"] == $_POST["passwordSession"]){
			// Se manda llamar el método del controlador para editar usuario
			$editar = $mvc->editarUsuarioController();

			// Si se realizaron con éxito los cambios se redirecciona a index con las variables de GET 
			// correspondientes
			if($editar){
				header("Location:index.php?action=usuarios&changes=yes");
			}
		}else{
			// Si la contraseña del usuario en sesión no es la correcta
			echo "<script> alert('Su contraseña es incorrecta!') </script>";
		}		
	}
	

 ?>

<!-- Formulario para editar usuario -->
<br><br>
 <form method="POST">


 	<label>Nombre</label>
 	<input type="text" name="usuario" placeholder="Nombre de usuario" value="<?php echo($usuario['usuario']) ?>" required>
 	<br><br>

 	<label>Contraseña</label>
 	<input type="password" name="password" placeholder="Contraseña" value="<?php echo($usuario['password']) ?>" required>
 	<br><br>

 	<label>Email</label>
 	<input type="email" name="email" placeholder="Correo electrónico" value="<?php echo($usuario['email']) ?>" required>
 	<br><br><br>

 	<label>Ingrese su contraseña</label>
 	<input type="password" name="passwordSession" placeholder="Ingrese su contraseña" required>


 	<input type="submit" name="editar" value="Editar usuario">

 </form>