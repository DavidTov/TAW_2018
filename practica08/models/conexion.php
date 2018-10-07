<?php
	
	/*
		CLASE conexion QUE SIRVE PARA HACER LA CONEXIÓN A LA BD
		TIENE UN MÉTODO conectar EN EL CUAL SE DECLARA UN OBJETO DEL TIPO PDO PASÁNDOLE COMO 
		PARÁMETROS AL CONSTRUCTOR EL NOMBRE DEL SERVIDOR, NOMBRE DE LA BD, USUARIO Y CONTRASEÑA.

		Y AL FINAL SE RETORNA EL OBJETO DEL TIPO PDO
	*/

	class Conexion{

		public function conectar(){
			//$dsn = 'mysql:dbname=php_jugadores;host=localhost;';
			/*$dsn = 'mysql:dbname=mvc;host=localhost;';
			$user = 'root';
			$password = '';

			try{
				$pdo = new PDO($dsn, $user, $password);
			}catch( PDOException $e ){
				echo 'Error al conectarnos: ' . $e->getMessage();
			}*/

			$link = new PDO("mysql:host=localhost;dbname=mvc","root","");

			return $link;

			//return $pdo;
		}
		
	}



	//id, usuario, password
?>