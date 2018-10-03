<?php 

	class EnlacesPaginas{
		// Función con el parámetro $enlacesModel que se recibe a través del controlador
		// public cualquier controlador consuma este modelo
		public function enlacesPaginasModel($enlacesModel){
			// Validamos
			if($enlacesModel == "nosotros" || $enlacesModel=="servicios" || $enlacesModel=="contacto"){
				// Mostramos el URL concatenado con la variable $enlacesModel
				$module = "views/modules/".$enlacesModel.".php";
			}

			// Una vez que action viene vacío (validando en el controlador) se consulta
			// si la variable $enlacesModel es igual a la cadena index, de ser así se
			// muestre index.php
			else if($enlacesModel == "index"){
					$module = "views/modules/inicio.php";
				}

				// Validar una LISTA BLANCA
				else {
					$module = "views/modules/inicio.php";
				}

			return $module;
		}
	}

 ?>