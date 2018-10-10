<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Principal </title>
</head>
<body>
	<center><h1> Crud de alumnos, tutores y carreras </h1></center>
</body>
</html>

<?php 
	
	// Se incluye el archivo de navegacion si la sesión está iniciada
	if($_SESSION)
		include "views/modules/navegacion.php";

	// Se crea un objeto tipo controller
	$mvc = new controller();

	// se manda llamar al método para saber qué página mostrar
	$mvc->enlacesPaginasController();

 ?>