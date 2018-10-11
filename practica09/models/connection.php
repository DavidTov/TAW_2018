<?php 

	// Se crea la clase connection la cual tendrá un método para conectarse a la BD
	class connection {
		public function conectar(){
			$pdo = new PDO("mysql:host=localhost;dbname=practica09", "admin", "53755c97ea6e4ef9940a4317edc7185434238be40224765c");	
			$pdo->exec("SET CHARACTER SET utf8");
			return $pdo;
		}
	}// Fin class connection

 ?>