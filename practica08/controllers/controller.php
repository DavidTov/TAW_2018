<?php 
	
	//Controlador principal, el padre
	class MvcController{
		//Llamar a la plantilla
		public function pagina(){
			//include se utiliza para invocar el archivo que contiene el código html
			include "views/template.php";
		}


		//ENLACES------------------
		// Interacción con el usuario
		public function enlacesPaginasController(){
			// Trabajar con los enlaces de las páginas
			// Validamos si la variable action viene vacía, es decir cuando se abre la 
			// página por primera vez se debe cargar la vista index.php
			if(isset($_GET["action"])){
				// Guardar el valor de la variable action en views/modules/navegacion.php
				// en el cual se recibe mediante GET esa variable
				$enlaces = $_GET["action"];
			}else{
				// Si viene vacía inicializa con index
				$enlaces = "index";
			}

			// Mostrar los archivos de los enlaces de cada una de las secciones: inicio, nosotros. etc.
			// Para esto hay que mandar al modelo para que haga dicho proceso y muestre la información.


			// Si la sesión está iniciada solo se podrá ver la vista de usuarios
			if($_SESSION && ($enlaces=="ingresar" || $enlaces=="registro" || $enlaces=="index")){
				$enlaces = "usuarios";
			}

			// Manda llamar el metodo que devuelve el archivo a incluir
			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			include $respuesta;			
		}

		#REGISTRO DE USUARIOS
		public function registroUsuarioController(){

			// Se crea un array asociativo con las variables devueltas del formulario con POST
			$datosController = array('usuario' => $_POST["usuarioRegistro"],'password' => $_POST["passwordRegistro"],'email' => $_POST["emailRegistro"]);

			
			// Se pasa el arreglo y el nombre de la tabla para realizar
			// la interacción con la BD a través del modelo
			$respuesta = Datos::registroUsuarioModel($datosController, "users");				


			//Se imprime la respuesta en la vista mandando con GET la variable action con el valor "ok"
			if($respuesta == "succes"){
				header("Location:index.php?action=ok");
			}else{
				// si no se registró con éxitó vuelve al index
				header("Location:index.php");
			}
		}



		#INICIO DE SESIÓN DE LOS USUARIOS
		//Saber si un usuario esta registrado pasándole como parámetro el usuario y contraseña
		public function ingresoUsuarioController($usuario, $contrasena){

			// Se trae la respuesta interactuando con el método del modelo el cual revisa que los datos
			// estén en la BD
			$respuesta = Datos::ingresoUsuarioModel($usuario, $contrasena);

			// Si es exitosa el ingreso del usuario se guardan sus datos en la variable SESSION
			if($respuesta == "succes"){
				$_SESSION["usuario"] = $_POST["usuarioIngreso"];
				$_SESSION["password"] = $_POST["passwordIngreso"];			

				// Una vez validado que el usuario existe se inicia sesión y se redirecciona al enlace
				header("Location:index.php?action=cambio");
			}else{
				// Si no fue exitosa el inicio de sesión se reedirecciona al formulario de registro en index
				header("Location:index.php");
			}
		}


		
		public function datoUsuarioController(){
			$respuesta = Datos::datoUsuarioModel();

			// Si tomo los datos del modelo para pasarlos a la vista
			if($respuesta){ 
				return $respuesta;
			}else{
				return "Error";
			}

		}



		public function editarUsuarioController() {
			$respuesta = Datos::editarUsuarioModel($_GET["id"], $_POST["usuario"], $_POST["password"], $_POST["email"]);

			//Si se realizó con éxito la actualización de los datos
			if($respuesta){ return true; }
			else { return false; }
		}


		public function getUsuarioController() {
			$respuesta = Datos::getUsuarioModel($_GET["id"]);

			//Si se realizó con éxito la buqueda de los datos
			if($respuesta){ return $respuesta; }
			else { return "Error"; }
		}


		//Eliminar usuario
		public function eliminarUsuarioController(){
			$respuesta = Datos::eliminarUsuarioModel($_GET["id"]);

			//Si se eliminó con éxito al usuario con el id especificado
			if($respuesta){ return $respuesta; }
			else { return "Error"; }
		}
	}//Fin MvcController

 ?>