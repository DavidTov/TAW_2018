<?php 
	
	$mvc = new MvcController();
	
	// Se guarda el id del regitro a editar
	if(isset($_GET["id"])){
		$id = $_GET["id"];

		// Se traen todos los datos del usuario
		$usuario = $mvc->getUsuarioController();
	}

	

	if(isset($_POST["editar"])){
		if($_SESSION["password"] == $_POST["passwordSession"]){
			$editar = $mvc->editarUsuarioController();
			if($editar){
				header("Location:index.php?action=usuarios&changes=yes");
			}
		}else{
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