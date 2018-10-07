<h1> REGISTRO DE USUARIOS </h1>

<form method="POST">
	<input type="text" placeholder="Usuario" name="usuarioRegistro" required>

	<input type="password" placeholder="Contraseña" name="passwordRegistro" required>

	<input type="email" placeholder="Email" name="emailRegistro" required>

	<input type="submit" value="Enviar" name="registro_btn">
	
</form>


<?php 
	
	//Enviar los datos al controlador
	$registro = new MvcController();

	//Se invoca al método correspondiente
	if(isset($_POST["registro_btn"]))
		$registro->registroUsuarioController();


	if(isset($_GET["action"])){
		if($_GET["action"] == "ok"){
			echo "Registro Exitoso";
		}
	}
 ?>