<h1> INGRESAR </h1>

<form method="POST">
	<input type="text" name="usuarioIngreso" placeholder="Nombre de usuario">

	<input type="password" name="passwordIngreso" placeholder="Contraseña">

	<input type="submit" value="Ingresar" name="ingresar">

</form>


<?php 
		

	$ingreso = new MvcController();

	if(isset($_GET["action"])){
		if($_GET["action"] == "ok"){
			echo "<script> alert('Usuario registrado con éxito!') </script>";
		}
	}

	if(isset($_POST["ingresar"])){
		$usuario = $_POST["usuarioIngreso"];
		$contrasena = $_POST["passwordIngreso"];


		// Si los datos de ingreso son correctos se reedirige al index.php?action=cambio
		$ingreso->ingresoUsuarioController($usuario, $contrasena);
	}



 ?>