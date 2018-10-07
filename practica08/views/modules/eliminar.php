<?php 

	$mvc = new MvcController();

	if(isset($_GET["id"])){
		$id = $_GET["id"];

		// Se traen todos los datos del usuario a eliminar
		$usuario = $mvc->getUsuarioController();
	}

	if(isset($_POST["eliminar"])){
		if($_SESSION["password"] == $_POST["passwordSession"]){
			$eliminar = $mvc->eliminarUsuarioController();
			if($eliminar){				
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

 	<input type="hidden" name="id" value="<?php  echo($usuario['id'])?>">
 	
 	<br>

 	<label>Para eliminar el usuario <b><?php echo($usuario['usuario']) ?></b> Ingrese su contraseña</label>
 	<br> 	
 	<input type="password" name="passwordSession" placeholder="Ingrese su contraseña" required>


 	<input type="submit" name="eliminar" value="Eliminar usuario">

 </form>