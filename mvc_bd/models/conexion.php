<?php
	
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

			$link = new PDO("mysql:host=localhost;dbname=mvc","admin","53755c97ea6e4ef9940a4317edc7185434238be40224765c");

			return $link;

			//return $pdo;
		}
		
	}



	//id, usuario, password
?>