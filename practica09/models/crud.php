<?php 
	
	/* Aquí se tendrán todos los métodos para comunicarse con la BD para hacer un crud */

	// Se manda llamar el archivo para conectarse
	require_once "connection.php";

	class Datos {

		#VERIFICA SI EXISTE YA UN USUARIO
		public function usuarioRepetidoModel($usuario){

			// consulta sql
			$sql = "SELECT usuario FROM users WHERE usuario=?";
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la consulta
			$stmt->execute([$usuario]);

			// Se le asigna el registro si este existe, sino se le asigna false
			$respuestaModel = $stmt->fetch();			

			// Si no hay coincidencias de usaurios entonces se retorna false
			if($respuestaModel == false){
				// No hay usuarios con ese nombre";
				return false;
			}else{
				// se encontró una coincidencia
				return true;
			}
			
		}

		#registra un usuario
		public function registroUsuarioModel($usuario, $password){			


			// Si el usuario no existe entonces se procede a establecer la consulta sql para agregar
			$sql = "INSERT INTO users (usuario, password) VALUES (?,?)";

			// Se prepara la sentencia sql con prepare
			$stmt = connection::conectar()->prepare($sql);

			// Si se ejecuta con éxito devuelve true, caso contrario devuelve false
			if($stmt->execute([$usuario, $password])){
				return true;
			}else{
				return false;
			}
		}


		#VERIFICA SI EL USUARIO INGRESADO EXISTE PARA PODER INICIAR SESIÓN
		   // --  Recibe como parḿetros el usuario y el password
		public function verificaUsuarioModel($usuario, $password){
			// Se establece la consulta sql
			$sql = "SELECT * FROM users WHERE usuario=? AND password=?";

			// Se prepara la sentencia sql con prepare()
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la sentencia y se le pasan los parámetros usuario y password
			$stmt->execute([$usuario, $password]);

			// Se guarda un arreglo conformado por el registro encontrado(si existe)
			$respuestaModel = $stmt->fetch();

			if($respuestaModel == false){
				// No se encontraron registros
				return false;
			}else{
				// Quiere decir que el usuario si existe
				return true;
			}
		}


		#CONSULTAR LOS DATOS DE LOS USUARIO DE UNA TABLA ESPECÍFICA
		public function datosUsuariosModel($tabla){
			//Sentencia sql
			$sql = "SELECT * FROM $tabla";

			// Se pasa la sentencia como parámetro en el método prepare
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la sentencia
			$stmt->execute();

			// Se le asigna un array con todos
			$respuestaModel = $stmt->fetchAll();

			if($respuestaModel == false){ return false; }
			else{ return $respuestaModel; } // Se retorna el array
		}



		#TRAE TODOS LOS DATOS DE LOS USUARIOS HACIENDO INNER JOIN DE LAS TRES TABLAS
		public function getAllModel($id=null){
			// Sentencia sql - inner join de las tablas

			if($id != null){
				$sql = "SELECT * FROM students INNER JOIN tutores on students.id_tutor=tutores.id INNER JOIN carreras on students.id_carrera=carreras.id WHERE students.matricula=?";

				// Se pasa la sentencia sql como parámetro del método prepare
				$stmt = connection::conectar()->prepare($sql);

				// Se ejecuta la consulta	
				$stmt->execute([$id]);

				// Se almacena en un array todos los registros
				$respuestaModel = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			else{
				$sql = "SELECT * FROM students INNER JOIN tutores on students.id_tutor=tutores.id INNER JOIN carreras on students.id_carrera=carreras.id";

				// Se pasa la sentencia sql como parámetro del método prepare
				$stmt = connection::conectar()->prepare($sql);

				// Se ejecuta la consulta			
				$stmt->execute();

				// Se almacena en un array todos los registros
				$respuestaModel = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		
			
			// se retorna el array
			return $respuestaModel;
		}


		#TRAE EL REGISTRO DEL USAURIO ENCONTRADO POR EL ID (VARIABLE CON GET)
		public function obtenerUsuarioModel($id, $tabla){
			// Sentencia sql
			// Si la tabla es students el id es la matricula
			if($tabla == "students"){
				$sql = "SELECT * FROM $tabla WHERE matricula=?";	
			}else{
				$sql = "SELECT * FROM $tabla WHERE id=?";
			}
			
			// Se prepara la sentencia con prepare
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la sentencia
			$stmt->execute([$id]);

			// Se guarda un array con el registro encontrado
			$respuestaModel = $stmt->fetch(PDO::FETCH_ASSOC);						

			// Si no se trajo ningún registro se retorna false, de lo contrario retorna el array
			if($respuestaModel == false){ return false; }
			else{ return $respuestaModel; }
		}



		#VERIFICA LA MATRICULA (si ya existe)
		public function verificaMatriculaModel($matricula){
			$sql = "SELECT matricula FROM students WHERE matricula=?";
			$resultado = connection::conectar()->prepare($sql);
			$resultado->execute([$matricula]);

			// Se le asigna un array con los elementos encontrados en la consulta
			$res = $resultado->fetchAll();
			

			// se le asigna el numero de elementos que se obtienen del array
			$res = count($res);	
			
			// Si el contador es cero significa que no existe la matricula ingresada
			// Por lo tanto se tiene que insertar (true)
			if($res > 0){			
				return false;
			}else{				
				return true;
			}
		}


		#REGISTRAR UN ALUMNO
		public function registroAlumnoModel($matricula, $nombre, $carrera, $situacion, $email, $tutor, $foto){
			// Sentencia sql
			//Obtener el id de la carrera seleccionada
			$sql = "SELECT id FROM carreras WHERE nombreCarrera=?";
			$resultado = connection::conectar()->prepare($sql);
			$resultado->execute([$carrera]);

			$id = $resultado->fetchAll();		
			$id_carrera = $id[0]["id"];

			echo $id_carrera . "<br>";


			//Se obtiene el id del tutor
			$sql = "SELECT id FROM tutores WHERE nombreTutor=?";
			$resultado = connection::conectar()->prepare($sql);
			$resultado->execute([$tutor]);

			$id = $resultado->fetchAll();
			$id_tutor = $id[0]["id"];					


			$sql = "INSERT INTO students (matricula,nombre,id_carrera,situacionAcademica,email,id_tutor,foto) VALUES (?,?,?,?,?,?,?)";

			// Se prepara la sentencia con prepare
			$stmt = connection::conectar()->prepare($sql);

			$respuesta = $stmt->execute([$matricula, $nombre, $id_carrera, $situacion, $email, $id_tutor, $foto]);
		
			if($respuesta){
				return true;
			}else{
				return false;
			}
		}

		// agregar una carrera
		public function registroCarreraModel($nombreCarrera){
			//Consulta sql
			$sql = "INSERT INTO carreras (nombreCarrera) VALUES (?)";

			// Se pasa la conslta como parámetro al método del objeto PDOStatement el cual está conformado 
			// por el método conectar de la clase connection
			$stmt = connection::conectar()->prepare($sql);

			if($stmt->execute([$nombreCarrera])){
				return "succes";
			}else{
				return "Error";
			}

			$stmt->close();
		}
	}
 ?>