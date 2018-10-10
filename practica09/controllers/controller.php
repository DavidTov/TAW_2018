<?php 
	
	// Se crea la clase controller
	class controller {

		public function paginaPrincipal(){
			include "views/template.php";
		}



		// manda una variable con GET y el modelo le regresa el enlace y el controlador lo envía a la vista
		public function enlacesPaginasController(){
			if(isset($_GET["action"])){
				$enlaces = $_GET["action"];
			}else{
				$enlaces = "iniciarSesion";
			}

			// Recibe la respuesta del modelo
			$respuesta = paginas::enlacesPaginasModel($enlaces);

			include $respuesta;
		}

		#VERIFICA SI EXISTE UN USUARIO
		public function usuarioRepetidoController(){
			$respuesta = Datos::usuarioRepetidoModel($_POST["usuario"]);

			// Si devuelve false quiere decir que se registró con éxito
			if(!$respuesta){ return true;}
			// Si existe un ususario con ese nombre, se redirecciona con GET al registro
			else{ header("Location:index.php?action=existe"); }
		}


		#REGISTRAR UN USUARIO
		public function registroUsuarioController(){
			$respuesta = Datos::registroUsuarioModel($_POST["usuario"], $_POST["password"]);

			if($respuesta){
				// Si se registró con exito
				header("Location:index.php?action=ok");
			}else{
				// Si hubo algún error en el registro
				header("Location:index.php?action=error");
			}
		}


		#INICIAR SESIÓN
		public function sesionController(){
			// Se llama al método de la clase datos que verifica si el usuario existe
			$respuesta = Datos::verificaUsuarioModel($_POST["usuario"], $_POST["password"]);

			// Si la respuesta es true quiere decir que existe el usuario y se redirecciona al index con una 
			//variable GET
			if($respuesta){
				// Se inicializan los valores de la variable de sesion $_SESSION
				$_SESSION["usuario"] = $_POST["usuario"];
				$_SESSION["password"] = $_POST["password"];

				header("Location:index.php?action=sesionOk");
			}else{
				header("Location:index.php?action=sesionError");
			}
		}


		#TRAER DATOS DE LOS USUARIOS DE UNA TABLA EN ESPECÍFICO
		public function datosUsuariosController($tabla){
			$respuesta = Datos::datosUsuariosModel($tabla);

			if($respuesta){ return $respuesta; }
			else{ return false; }
		}


		#TRAER TODOS LOS DATOS DE LOS USUARIOS RECIBIENDO LA RESPUESTA DEL MODELO
		public function getAllController($id=null){

			if($id != null)
				$respuesta = Datos::getAllModel($id);
			else
				$respuesta = Datos::getAllModel();

			if($respuesta){ return $respuesta; }
			else{ return false; }
		}


		#TRAE TODOS LOS DATOS DE UN USUARIO CON EL ID ESPECIFICADO CON GET
		public function obtenerUsuarioController($tabla){
			// Se llama la función del modelo pasándole la variable obtenida con GET
			$respuesta = Datos::obtenerUsuarioModel($_GET["id"], $tabla);

			// Si se ejecuta con éxito la consulta devuelve la respuesta que sería un array asociativo
			if($respuesta){ return $respuesta;}
			else{ return false;} // caso contrario
		}



		#VERIFICA MATRICULA SI EXISTE
		public function verificaMatriculaController(){
			$respuesta = Datos::verificaMatriculaModel($_POST["matricula"]);

			if($respuesta){ return true;}
			else{ return header("Location:index.php?action=matriculaExiste"); }
		}


		public function registroAlumnoController(){
			// Se reciben los datos con POST y semandan como parámetro al modelo
			$matricula = $_POST["matricula"];
			$nombre = $_POST["nombre"];
			$carrera = $_POST["carrera"];
			$situacion = $_POST["situacion"];
			$email = $_POST["email"];
			$tutor = $_POST["tutor"];
			$foto = $_POST["foto"];

			$respuesta = Datos::registroAlumnoModel($matricula, $nombre, $carrera, $situacion, $email, $tutor, $foto);

			if($respuesta){
				header("Location:index.php?action=alumnoOk");
			}else{
				header("Location:index.php?action=alumnoError");
			}
		}


		#EDITAR ALUMNO
		public function editarAlumnoController(){

			// Se asignan a las variables los datos ingresados en el form de editar con POST
			$matricula = $_POST["matricula"];
			$nombre = $_POST["nombre"];
			$carrera = $_POST["carrera"];
			$situacion = $_POST["situacion"];
			$email = $_POST["email"];
			$tutor = $_POST["tutor"];
			$foto = $_POST["foto"];

			

			$respuesta = Datos::editarAlumnoModel($matricula, $nombre, $carrera, $situacion, $email, $tutor, $foto);

			// Si se editó con éxito, manda la variable action con GET
			if($respuesta){
				header("Location:index.php?action=editadoOk");
			}else{
				header("Location:index.php?action=editadoError");
			}
		}

		#REGISTRAR UNA CARRERA
		public function registroCarreraController(){
			$repsuesta = Datos::registroCarreraModel($_POST["nombreCarrera"]); 

			if($respuesta == "succes"){
				header("Location:index.php?action=ok");
			}else{
				header("Location:index.php?action=error");
			}
		}



		#ELIMINAR UN ALUMNO
		public function eliminarAlumnoController(){
			// Se almacena el resultado que devuelve la función del modelo
			$respuesta = Datos::eliminarAlumnoModel($_GET["id"]);
			if($respuesta){ 
				header("Location:index.php?action=alumnos");
			}
			else{ return false; }
		}
	}// Fin class controller


 ?>