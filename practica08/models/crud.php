
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


		#TRAER LOS DATOS DE LOS USUARIOS
		public function datoUsuarioModel(){
			// Se guarda la consulta sql
			$sql = "SELECT * FROM users";

			// Se pasa la consulta al método prepare
			$stmt = conexion::conectar()->prepare($sql);

			// Se ekecuta la consulta
			$stmt->execute();

			// Te trae todos los registros de los usuarios
			$respuesta = $stmt->fetchAll();

			// se retornan los datos
			return $respuesta;

			// Se cierra la conexión
			$stmt->close();	
		}


		#EDITAR LOS DATOS DE LOS USUARIOS
		public function editarUsuarioModel($id, $usuario, $password, $email){

			// Se establece la consulta sql
			$sql = "UPDATE users SET usuario=?, password=?, email=? WHERE id=?";

			// Se pasa la consulta al método prepare			
			$stmt = conexion::conectar()->prepare($sql);

			// se ejecuta pasándole las variables de los parámetros
			// Si se ejecuta con éxito devuelve true, caso contrario false
			if($stmt->execute([$usuario, $password, $email, $id])){
				return true;
			}else{
				return false;
			}

			// Se cierra la conexión
			$stmt->close();
		}


		// Se trae todo el registro del usuario, se pasa el id como parámetro
		public function getUsuarioModel($id){

			// Se establece la consulta sql
			$sql = "SELECT * FROM users WHERE id=?";

			// se pasa la consulta al método prepare
			$stmt = conexion::conectar()->prepare($sql);

			// Se ejecuta pasándole la variable del parámetro de la función
			$stmt->execute([$id]);

			// se guarda en la variable un array asociativo del registro encontrado
			// fetch() solo regresa un registro.
			$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

			// Se retorna el arreglo
			return $usuario;

			// Se cierra la conexión
			$stmt->close();
		}


		#ELIMINAR USUARIOS
		public function eliminarUsuarioModel($id){

			// Se establece la consulta sql
			$sql = "DELETE FROM users WHERE id=?";

			// Se pasa la consulta al método prepare();
			$stmt = conexion::conectar()->prepare($sql);

			//Se ejecuta pasandole al método la variable que se recibió como parámetro+
			// Si se ejecuta con exito devuelve true, caso contrario devuelve false
			if($stmt->execute([$id])){
				return true;
			}else{
				return false;
			}

			// Se cierra la conexión
			$stmt->close();
		}
	}// Fin class Datos

 ?>