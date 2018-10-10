<?php 

	// Se crea la clase connection la cual tendrá un método para conectarse a la BD
	class connection {
		public function conectar(){
			$pdo = new PDO("mysql:host=localhost;dbname=practica09", "root", "");	
			$pdo->exec("SET CHARACTER SET utf8");
			return $pdo;
		}
	}// Fin class connection

 ?>