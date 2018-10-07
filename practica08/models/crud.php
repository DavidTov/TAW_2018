
<?php 

	require_once "conexion.php";


	class Datos extends Conexion{

		#REGISTRO DE USUARIOS
		// Se pasa comoparámetro el array y el nombre de la tabla
		public function registroUsuarioModel($datosModel, $tabla){

			// Se ejecuta la sentencia con el objeto PDO statement a través del método conectar
			// de la clase conexión
			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES(:usuario,:password,:email)");

			// Se pasan las variables a través de consultas preparadas
			$stmt->bindParam(":usuario", $datosModel["usuario"]);
			$stmt->bindParam(":password", $datosModel["password"]);
			$stmt->bindParam(":email", $datosModel["email"]);

			// Si se ejecuta con éxito se devuelve la cadena correspondiente
			// caso contrario se devuelve "Error"
			if($stmt->execute()){
				return "succes";
			}else{
				return "Error";	
			}

			// Se cierra la conexión
			$stmt->close();
			
		}



		#INGRESO-INICIO DE SESIÓN DE USUARIOS------------------
		public function ingresoUsuarioModel($usuario, $contrasena){

			// Se establece la consulta sql
			$sql = "SELECT * FROM users WHERE usuario=:usuario AND password=:password";

			// Se pasa como parámetro del método prepare() del objeto PDOStatement conformado por el 
			// método conectar() de la clase conexión
			$stmt = conexion::conectar()->prepare($sql);

			// Se pasan las variables con consultas preparadas
			$stmt->bindParam(":usuario",$usuario);
			$stmt->bindParam(":password",$contrasena);

			// Se ejecuta la consulta
			$stmt->execute();

			// se guarda con fetch un array
			$res = $stmt->fetch();

			// Si el array no es vació
			if($res){
				return "succes";
			}else{
				// Si devuelve un array vacío
				return "Error";
			}

			// Se cierra la conexión
			$stmt->close();
		}


		public function datoUsuarioModel(){
			$sql = "SELECT * FROM users";
			$stmt = conexion::conectar()->prepare($sql);
			$stmt->execute();

			// Te trae todos los registros de los usuarios
			$respuesta = $stmt->fetchAll();

			
			return $respuesta;

			$stmt->close();	
		}



		public function editarUsuarioModel($id, $usuario, $password, $email){
			$sql = "UPDATE users SET usuario=?, password=?, email=? WHERE id=?";
			$stmt = conexion::conectar()->prepare($sql);

			if($stmt->execute([$usuario, $password, $email, $id])){
				return true;
			}else{
				return false;
			}

			$stmt->close();
		}


		// Se trae todo el registro del usuario
		public function getUsuarioModel($id){
			$sql = "SELECT * FROM users WHERE id=?";
			$stmt = conexion::conectar()->prepare($sql);

			$stmt->execute([$id]);

			$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
			return $usuario;

			$stmt->close();
		}


		// Eliminar el usuario
		public function eliminarUsuarioModel($id){
			$sql = "DELETE FROM users WHERE id=?";
			$stmt = conexion::conectar()->prepare($sql);

			if($stmt->execute([$id])){
				return true;
			}else{
				return false;
			}

			$stmt->close();
		}
	}// Fin class Datos

 ?>