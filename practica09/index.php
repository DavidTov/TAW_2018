<?php 

	// Index
	
	session_start();
	// Se incluyen los archivos correspondientes
	require_once "models/enlaces.php";
	require_once "models/crud.php";

	require_once "controllers/controller.php";

	// Se crea un objeto del tipo controller
	$mvc = new controller();

	// Se manda llamar al método
	$mvc->paginaPrincipal();

 ?>

