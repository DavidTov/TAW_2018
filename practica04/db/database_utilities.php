<?php
	require_once('database_credentials.php');

	//Se realiza la conexion a la base de datos, utilizando las constantes definidas en database_credentials.php
	//$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

	try{
		$conn = new PDO("mysql:host=".DB_HOST.";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
		$conn->exec("SET CHARACTER SET utf8");
	}catch(Exception $e){
		echo "Hubo un error" . $e->getMessage();;
	}finally{
		//echo "un string";
	}

	//Funcion que permite agregar un nuevo usuario a la base de datos, requiere nombre y correo.
	function add($nombre,$correo){
		global $conn;
		$sentencia = $conn->prepare("INSERT INTO user (nombre, email) VALUES (?, ?);");
		$sentencia->execute([$nombre, $correo]);
		if($sentencia == TRUE) { echo "Insertado correctamente";}
		//$sql = "INSERT INTO usuario (nombre,correo) VALUES ('$nombre','$correo')";
		//$conn->query($sql);
	}

	//Funcion que permite actualizar los atributos de un usuario existente, requiere nombre, correo y su id.
	function update($id,$nombre,$correo){
		global $conn;
		$sentencia = $conn->prepare("UPDATE user SET nombre=:nombre, email=:email where id=:id");

		$sentencia->bindParam(":nombre",$nombre);
		$sentencia->bindParam(":email",$correo);		
		$sentencia->bindParam(":id",$id);

		$sentencia->execute();
		//$sql = "UPDATE usuario SET nombre='$nombre', correo='$correo' where id=$id";
		//$conn->query($sql);
	}

	//Funcion que permite eliminar un usuario de la base de datos utilizando su id.
	function delete($id){
		global $conn;
		$sql = "DELETE FROM user where id=:id";
		$sentencia = $conn->prepare($sql);

		$sentencia->bindParam(":id",$id);

		$sentencia->execute();
		//$conn->query($sql);
	}

	//Funcion que permite obtener todos los registros encontrados en la tabla usuarios de la base de datos.
	function get_all(){
		global $conn;
		$sql = 'SELECT * FROM user';
		$sentencia = $conn->prepare($sql);
		$sentencia->execute();
		$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);

		//$r = $conn->query($sql);
		//if($r->num_rows)
		//	return $r;
		return $personas;
	}

	//Funcion que permite realizar una busqueda de un usuario para obtener todos sus atributos mediante su id.
	function search($id){
		global $conn;
		$sql = "SELECT * FROM user where id=:id";

		$sentencia = $conn->prepare($sql);		
		
		$sentencia->bindParam(":id",$id);
		$sentencia->execute();


		//$r = $conn->query($sql);
		//if($r->num_rows)
		//	return mysqli_fetch_assoc($r);
		//return [];
	}
?>