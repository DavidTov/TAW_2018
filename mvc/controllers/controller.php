<?php 
	
	//Controlador principal, el padre
	class MvcController{
		//Llamr a la plantilla
		public function plantilla(){
			//include se utiliza para invocar el archivo que contiene el código html
			include "views/template.php";
		}

		// Interacción con el usuario
		public function enlacesPaginasController(){
			// Trabajar con los enlaces de las páginas
			// Validamos si la variable action viene vacía, es decir cuando se abre la 
			// página por primera vez se debe cargar la vista index.php
			if(isset($_GET["action"])){
				// Guardar el valor de la variable action en views/modules/navegacion.php
				// en el cual se recibe mediante GET esa variable
				$enlacesController = $_GET["action"];
			}else{
				// Si viene vacía inicializa con index
				$enlacesController = "index";
			}

			// Mostrar los archivos de los enlaces de cada una de las secciones: inicio, nosotros. etc.
			// Para esto hay que mandar al modelo para que haga dicho proceso y muestre la información.
			$respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
			include $respuesta;			
		}
	}

 ?>