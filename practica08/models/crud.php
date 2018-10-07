
<?php 

	require_once "conexion.php";


	class Datos extends Conexion{

		#REGISTRO DE USUARIOS
		public function registroUsuarioModel($datosModel, $tabla){
			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES(:usuario,:password,:email)");

			$stmt->bindParam(":usuario", $datosModel["usuario"]);
			$stmt->bindParam(":password", $datosModel["password"]);
			$stmt->bindParam(":email", $datosModel["email"]);

			if($stmt->execute()){
				return "succes";
			}else{
				return "Error";	
			}

			$stmt->close();
			
		}



		#INGRESO DE USUARIOS------------------
		public function ingresoUsuarioModel($usuario, $contrasena){
			$sql = "SELECT * FROM users WHERE usuario=:usuario AND password=:password";
			$stmt = conexion::conectar()->prepare($sql);

			$stmt->bindParam(":usuario",$usuario);
			$stmt->bindParam(":password",$contrasena);

			$stmt->execute();
			$res = $stmt->fetch();

			//var_dump($res);
			if($res){
				return "succes";
			}else{
				return "Error";
			}

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