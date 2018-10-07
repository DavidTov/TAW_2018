<?php 

	// el index que muestra al usuario la salida de las vistas y a través de él 
	// enviaremos las diferentes acciones del usuario al controlador

	// Mostrar la plantilla al usuario (template.php) la cual se alojará en views

	
	
 	session_start();
	// Invocamos el modelo que se utilizará en todos los archivos
	require_once "models/enlaces.php"; //La parte pública que muestra los datos
	require_once "models/crud.php";

	require_once "controllers/controller.php"; //Recibir lo que el usuario diga

	//Para poder ver el template, se hace una petición mediante a un controlador
	//Creamos el objeto: 
	$mvc = new MvcController();

	//Muestra la función "plantilla" que se encuentra en controllers/controller
	$mvc->pagina();
 ?>