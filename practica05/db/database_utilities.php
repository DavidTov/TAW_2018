<?php

include "connection.php";


//Funciones que retornan un scalar, de acuerdo a los registro de las tablas

// Retorna cuántos usuarios están registrdos: Tabla user,
function count_users(){
	global $pdo; // Variable global
	
	$sql = "SELECT * FROM user"; //Consulta SQL
	$resultado = $pdo->prepare($sql); //Se prepara la consulta
	$resultado->execute(); //Sejecuta
	
	$usuarios = $resultado->fetchAll(PDO::FETCH_OBJ); //Se almacena en un array los registros
	
	return count($usuarios); // Se cuentan el número de registros que hay y se retorna.
}



// Retorna cuántos tipos de usuarios existen: Tabla user_type
function count_types(){
	global $pdo; //Variable global
		
	$sql = "SELECT * FROM user_type"; //Consulta SQL
	$resultado = $pdo->prepare($sql); //Se prepara la consulta 
	$resultado->execute();	//Se ejecuta
	
	$tipos = $resultado->fetchAll(PDO::FETCH_OBJ); //Se almacenan en un array los registroa
	
	return count($tipos); // Se cuentan el número de registros que hay y se retorna.
}



// Cuenta cuántos status existen (registros tabla status)
function count_status(){
	global $pdo; //Variable global
	
	$sql = "SELECT * FROM status";//Consulta SQL
	$resultado = $pdo->prepare($sql); //Se prepara la consulta 
	$resultado->execute(); //Se ejecuta

	$status = $resultado->fetchAll(PDO::FETCH_OBJ); //Se almacenan en un array los registroa

	return count($status); // Se cuentan el número de registros que hay y se retorna.

}


// Cuenta los registros de la tabla user_log
function count_access(){
	global $pdo;
	
	$sql = "SELECT * FROM user_log";//Consulta SQL
	$resultado = $pdo->prepare($sql); //Se prepara la consulta 
	$resultado->execute(); //Se ejecuta

	$log = $resultado->fetchAll(PDO::FETCH_OBJ); //Se almacenan en un array los registroa

	return count($log); // Se cuentan el número de registros que hay y se retorna.
}


// Cuenta los usuarios activos
function count_active(){
	global $pdo;
	
	$activo = 1; //Status activo
	$sql = "SELECT * FROM user WHERE status_id = ?";//Consulta SQL
	$resultado = $pdo->prepare($sql); //Se prepara la consulta 
	$resultado->execute([$activo]); //Se ejecuta y se pasa la variable $activo

	$log = $resultado->fetchAll(PDO::FETCH_OBJ); //Se almacenan en un array los registroa

	return count($log); // Se cuentan el número de registros que hay y se retorna.

}


//Cuenta los usuarios inactivo
function count_inactive(){
	global $pdo;

	$inactivo = 2; //Status inactivo
	$sql = "SELECT * FROM user WHERE status_id = ?";//Consulta SQL
	$resultado = $pdo->prepare($sql); //Se prepara la consulta 
	$resultado->execute([$inactivo]); //Se ejecuta y se pasa la variable $inactivo

	$log = $resultado->fetchAll(PDO::FETCH_OBJ); //Se almacenan en un array los registroa

	return count($log); // Se cuentan el número de registros que hay y se retorna.

}


//Función que permite traer todos los registros de la tabla como parámetro
function selectAllFromTable ($tabla){
	global $pdo; //Variable global

	$sql = "SELECT * FROM " . $tabla; //Consulta SQL
	$resultado = $pdo->prepare($sql);	
	$resultado->execute();

	$table = $resultado->fetchAll();

	return $table; //Se retornan todos los registros de la tabla
}



// obtener listado de los jugadores. Tabla sport_team
function getAll($id_type){
	global $pdo;

	$sql = "SELECT * FROM sport_team WHERE id_type = ?"; //Consulta
	$resultado = $pdo->prepare($sql);
	$resultado->execute([$id_type]);

	$registros = $resultado->fetchAll();

	//Se retornan todos los registros de la tabla dependiendo del tipo
	return $registros;
}


// Funcion que agrega nuevo jugador
function add($matricula, $nombre, $posicion, $carrera, $email, $id_type){
	global $pdo;

	$sql = "INSERT INTO sport_team (id, nombre, posicion, carrera, email, id_type) VALUES(?, ?, ?, ?, ?, ?)";
	$resultado = $pdo->prepare($sql);
	$resultado->execute([$matricula,$nombre, $posicion, $carrera, $email, $id_type]);	
}


//Función para modificar los datos del jugador
function update($matricula, $nombre, $posicion, $carrera, $email, $id_type){
	global $pdo;

	$sql = "UPDATE sport_team SET nombre=:nombre, posicion=:posicion, carrera=:carrera, email=:email, id_type=:id_type where id=:matricula";

	$resultado = $pdo->prepare($sql);

	//Se pasan los parámetros en la consulta con bindParam
	$resultado->bindParam(":matricula",$matricula);
	$resultado->bindParam(":nombre",$nombre);
	$resultado->bindParam(":posicion",$posicion);
	$resultado->bindParam(":carrera",$carrera);
	$resultado->bindParam(":email",$email);
	$resultado->bindParam(":id_type",$id_type);
	//$resultado->bindParam(":id",$matricula);

	//Mensaje de exito si se agŕegó
	$resultado->execute();
	if($resultado){ echo "Agregado";}
	else echo "No Agregado";
}


// Función que busca todo un registro dependiendo del id
 function search($id){
 	global $pdo;
	$sql = "SELECT * FROM sport_team where id=:id";

	$resultado = $pdo->prepare($sql);		
	
	$resultado->bindParam(":id",$id);
	$resultado->execute();

	return $resultado->fetch(PDO::FETCH_ASSOC);	// Se trae todo el registro
 }


 //Funcion que permite eliminar un usuario de la base de datos utilizando su id.
 function delete($id){
	global $pdo;
	$sql = "DELETE FROM sport_team where id=:id";
	$sentencia = $pdo->prepare($sql);

	$sentencia->bindParam(":id",$id);

	$sentencia->execute();
	
}


 // Función que valida si el email y password de un usuario existen. Tabla user
 function validar($email, $password){
 	global $pdo;
 	
 	$sql = "SELECT * FROM user where email=:email and password=:password";
 	
 	$resultado = $pdo->prepare($sql); // Se prepara la consulta

 	// Se pasan los parámetros de la consulta con los de la función
 	$resultado->bindParam(":email", $email);
 	$resultado->bindParam(":password", $password);

 	$resultado->execute(); // Se ejecuta la consulta
 	
 	$res = $resultado->fetch(PDO::FETCH_ASSOC);//Se le asigna a la variable el registro de la tabla
		

 	if($res){
 		//Existe el registro
 		return $res;
 	}else{
 		//No Existe el registro
 		return null;
 	}
 	
 }



  // Funcion que agrega nuevo usuario
 function add_user($email, $password, $status, $type){
	global $pdo;

	$sql = "INSERT INTO user (email, password, status_id, user_type_id) VALUES(?, ?, ?, ?)";
	$resultado = $pdo->prepare($sql);
	$resultado->execute([$email, $password, $status, $type]);

	if($resultado){echo "Exito!"; }
	else { echo "No se ha agregado";}
}

 
 function update_user($id_user, $password, $status){
 	global $pdo;

	$sql = "UPDATE user SET password=:password, status_id=:status where id=:id";

	$resultado = $pdo->prepare($sql);

	//Se pasan los parámetros en la consulta con bindParam
	$resultado->bindParam(":password",$password);
	$resultado->bindParam(":status",$status);
	$resultado->bindParam(":id",$id_user);			
	

	//Mensaje de exito si se agŕegó
	$resultado->execute();
	if($resultado){ echo "Actualizado";}
	else echo "No Agregado";
 }

  //Funcion que permite eliminar un usuario de la base de datos utilizando su id.
 function delete_user($id){
	global $pdo;
	//echo "en delete " .$id;
	$sql = "DELETE FROM user where id=?";
	$sentencia = $pdo->prepare($sql);

	//$sentencia->bindParam(":id",$id);

	$sentencia->execute([$id]);
	
}

 //Función que agrega registro a la tabla user_log cuando igresa un usuario
 function add_log($date, $user_id){
 	global $pdo;

 	$sql = "INSERT INTO user_log (date_logged_in, user_id) VALUES(?,?)";
 	$resultado = $pdo->prepare($sql);
 	$resultado->execute([$date, $user_id]);
 }



 // obtener todos los usuarios de la tabla user
 function getAll_user(){
	global $pdo;

	
	$sql = "SELECT * FROM user"; //Consulta
	$resultado = $pdo->prepare($sql);
	$resultado->execute();

	$registros = $resultado->fetchAll();

	//Se retornan todos los registros de la tabla dependiendo del tipo
	return $registros;
}
?>

