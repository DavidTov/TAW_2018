<?php 

	// el index que muestra al usuario la salida de las vistas y a través de él 
	// enviaremos las diferentes acciones del usuario al controlador

	// Mostrar la plantilla al usuario (template.php) la cual se alojará en views

	
	require_once "controllers/controller.php"; //Recibir lo que el usuario diga
 
	// Invocamos el modelo que se utilizará en todos los archivos
	require_once "models/model.php"; //La parte pública que muestra los datos


	//Para poder ver el template, se hace una petición mediante a un controlador
	//Creamos el objeto: 
	$mvc = new MvcController();

	//Muestra la función "plantilla" que se encuentra en controllers/controller
	$mvc->plantilla();
 ?>