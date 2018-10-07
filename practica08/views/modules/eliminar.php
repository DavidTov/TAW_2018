<?php 
	
	// Se crea un objeto del tipo MvcController()
	$mvc = new MvcController();

	// se guarda con GET el id del registro a eliminar
	if(isset($_GET["id"])){
		$id = $_GET["id"];

		// Se traen todos los datos del usuario a eliminar
		$usuario = $mvc->getUsuarioController();
	}


	// Si se dio clic en el botón de eliminar
	if(isset($_POST["eliminar"])){
		// Si la contraseña del usuario en sesión es correcta
		if($_SESSION["password"] == $_POST["passwordSession"]){
			//Se manda llamar al método del controller para la eliminación del usuario
			$eliminar = $mvc->eliminarUsuarioController();

			// Si se eliminó el usuario se redirecciona al index con la variable GET correspondiente
			if($eliminar){				
				header("Location:index.php?action=usuarios&changes=yes");
			}
		}else{
			// Sim la contraseña del usaurio en sesión es incorrecta
			echo "<script> alert('Su contraseña es incorrecta!') </script>";
		}
	}

 ?>



<!-- Formulario para editar usuario -->
<br><br>
 <form method="POST">

 	<input type="hidden" name="id" value="<?php  echo($usuario['id'])?>">
 	
 	<br>

 	<label>Para eliminar el usuario <b><?php echo($usuario['usuario']) ?></b> Ingrese su contraseña</label>
 	<br> 	
 	<input type="password" name="passwordSession" placeholder="Ingrese su contraseña" required>


 	<input type="submit" name="eliminar" value="Eliminar usuario">

 </form>