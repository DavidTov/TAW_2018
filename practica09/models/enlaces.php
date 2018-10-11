<?php 
	/* Mandará al controlador los enlaces que deben visualizarse en la vista*/

	class paginas {

		public function enlacesPaginasModel($enlaces){

			if($enlaces=="alumnos" || $enlaces=="tutores" || $enlaces=="carreras" || $enlaces=="salir"){
				$respuestaModel = "views/modules/".$enlaces.".php";
			}


			// Si está sin sesión. Regresa a la página principal index.php que es registro(incuye registro.php) 
			//xD, namás yo entiendo
			else if($enlaces == "iniciarSesion"){
				$respuestaModel = "views/".$enlaces.".php";
			}

			// "ok" se obtiene con GET si se realizó un registro exitoso de usuarios
			else if($enlaces == "ok"){
				$respuestaModel = "views/iniciarSesion.php";
			}

			else if($enlaces == "registroUsuarios"){
				$respuestaModel = "views/".$enlaces.".php";	
			}

			else if($enlaces == "existe"){
				$respuestaModel = "views/registroUsuarios.php";	
			}

			else if($enlaces == "matriculaExiste"){
				$respuestaModel = "views/modules/registroAlumno.php";
			}
			
			// Si orpimió algún botón para registrar un alumno, tutor o carrera
			else if($enlaces=="registroAlumno" || $enlaces=="registroTutor" || $enlaces=="registroCarrera"){
				$respuestaModel = "views/modules/".$enlaces.".php";
			}


			else if($enlaces=="sesionOk"){
				$respuestaModel = "views/modules/alumnos.php";
			}
			// Si los datos de ingresos son incorrectos
			else if($enlaces=="sesionError"){
				$respuestaModel = "views/iniciarSesion.php";
			}

			else if($enlaces=="alumnoOk" || $enlaces=="alumnoError" || $enlaces=="editadoOk" || $enlaces=="editadoError"){
				$respuestaModel = "views/modules/alumnos.php";
			}

			// Si se oprimió el botón de ver, editar o eliminar alumno
			else if($enlaces=="verAlumno" || $enlaces=="editarAlumno" || $enlaces=="eliminarAlumno"){
				$respuestaModel = "views/modules/".$enlaces.".php";	
			}

			else if($enlaces == "verAlumno"){
				$respuestaModel = "views/modules/".$enlaces.".php";
			}

			// Si el la variable no se reconoce con GET se redirecciona al registro
			else{
				$respuestaModel = "views/modules/registroUsuarios.php";
			}

			return $respuestaModel;
		}
	}

 ?>