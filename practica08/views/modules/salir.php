
<?php 
	
	// Si hay una sesión iniciada se destruye
	if($_SESSION){
		session_destroy();	
	}
	
	// de cualquier forma se redirecciona al index
	header("Location:index.php");

 ?>