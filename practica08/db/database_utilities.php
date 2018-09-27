<?php

include "connection.php";

	function registrarCarrera($carrera){
		global $pdo;

		$sql = "INSERT INTO carrera (nombreCarrera) VALUES(?)";
		$resultado = $pdo->prepare($sql);

		$resultado->execute([$carrera]);
	}


	function seleccionarCarrera(){
		global $pdo;

		$sql = "SELECT * FROM carrera";

		$resultado = $pdo->prepare($sql);
		$resultado->execute();

		
		
		return $resultado->fetchAll();
		/*while($res = $resultado->fetchAll()){
			print_r($res[0]["nombreCarrera"]);
		}*/	
	}

	/*function registrarTutor($nombre, id_);
		global $pdo;

		$sql = "INSERT INTO tutor (nombreTutor, id_carrera) VALUES (?,?)";
		$resultado = $pdo->prepare($sql); 

		$resultado->execute([$nombre])*/


?>

