<?php 

	// Llamada al modelo
	require_once "model/model.php";

	$personas = new personas_model();
	$datos = $personas->get_personas();

	// Llamada a la vista
	require_once "view/view.php";


	// El controlador debe tener siempre esta estructura llamada al modelo y debajo a la vista
	// si hubiera más modelos y vistas se sigue haciendo así con todos

 ?>