<?php 


	class Paginas{
		// Función con el parámetro $enlaces que se recibe a través del controlador
		// public cualquier controlador consuma este modelo
		public function enlacesPaginasModel($enlaces){
			// Validamos
			if($enlaces == "ingresar" || $enlaces=="usuarios" || $enlaces=="salir"
				|| $enlaces=="editar" || $enlaces=="eliminar"){
				// Mostramos el URL concatenado con la variable $enlaces
				$module = "views/modules/".$enlaces.".php";

				// Si se editó o eliminó a algún usuario
				if(isset($_GET["changes"])){
					echo "<script> alert('Cambios realizados con éxito!'); </script>";
				}
			}

			// Una vez que action viene vacío (validando en el controlador) se consulta
			// si la variable $enlaces es igual a la cadena index, de ser así se
			// muestre index.php

			// De acuerdo al parámetro enlaces retorna una cadena con la ruta del archivo
			
			else if($enlaces == "index"){
					$module = "views/modules/registro.php";
			}

			else if($enlaces=="ok"){
				$module = "views/modules/ingresar.php";	
			}

			else if($enlaces=="fallo"){
				$module = "views/modules/registro.php";
			}

			else if($enlaces=="cambio"){
				$module = "views/modules/usuarios.php";	
			}			


				// Validar una LISTA BLANCA
				else {
					$module = "views/modules/registro.php";
				}

			return $module;
		}
	}

 ?>