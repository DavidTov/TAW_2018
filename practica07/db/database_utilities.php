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


	function seleccionarTutor(){
		global $pdo;

		$sql = "SELECT * FROM tutor";
		$resultado = $pdo->prepare($sql);
		$resultado->execute();

		return $resultado->fetchAll();
	}


	function registrarTutor($nombre, $nombreCarrera){
		global $pdo;

		//Consulta para obtener el id de la carrera dependiendo del nombre
		$sql = "SELECT id FROM carrera WHERE nombreCarrera=:nombreCarrera";
		$resultado = $pdo->prepare($sql);
		$resultado->bindParam(":nombreCarrera", $nombreCarrera);

		
		$resultado->execute(); // Se ejecuta la ssentencia

		$id = $resultado->fetchAll(); // Se guarda lo encontrado		
		$id_carrera =  $id[0]["id"]; // se asigna el id específico de la carrera


		// Ahora se insertan el id y el nombre del tutor en la tabla tutor

		$sql = "INSERT INTO tutor (nombreTutor, id_carrera) VALUES (?,?)";
		$resultado = $pdo->prepare($sql); 

		// Si se ejecuta con éxito devuelve true, false en caso contrario
		if($resultado->execute([$nombre, $id_carrera])){
			return true;
		}else{
			return false;
		}
	}


	// Función para agregar un nuevo alumno
	function registrarAlumno($matricula, $nombre, $carrera, $nombreTutor){
		global $pdo;

		//Obtener el id de la carrera seleccionada
		$sql = "SELECT id FROM carrera WHERE nombreCarrera=?";
		$resultado = $pdo->prepare($sql);
		$resultado->execute([$carrera]);

		$id = $resultado->fetchAll();		
		$id_carrera = $id[0]["id"];



		//Se obtiene el id del tutor
		$sql = "SELECT id FROM tutor WHERE nombreTutor=?";
		$resultado = $pdo->prepare($sql);
		$resultado->execute([$nombreTutor]);

		$id = $resultado->fetchAll();
		$id_tutor = $id[0]["id"];

		

		// Se insertan los datos del alumno en la tabla alumno (nombre, id_carrera, id_tutor)
		$sql = "INSERT INTO alumno (matricula, nombreAlumno, id_tutor, id_carrera) VALUES(?,?,?,?)";
		$resultado = $pdo->prepare($sql);

		// condición para que no agregue letras o un cero
		if($matricula!=0){
			if($resultado->execute([$matricula, $nombre, $id_tutor, $id_carrera])){
				return true;
			}else{
				return false;
			}
		}
	}


	function verificarMatricula($matricula){
		global $pdo;

		$sql = "SELECT matricula FROM alumno WHERE matricula=?";
		$resultado = $pdo->prepare($sql);
		$resultado->execute([$matricula]);

		// Se le asigna un array con los elementos encontrados en la consulta
		$res = $resultado->fetchAll();

		//var_dump($res);

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



	// Obtiene todos los datos de los alumnos para mostrarlos en la tabla de index.php
	function getAll(){
		global $pdo;

		$sql = "SELECT * FROM alumno INNER JOIN tutor ON alumno.id_tutor=tutor.id INNER JOIN carrera ON tutor.id_carrera=carrera.id";

		$resultado = $pdo->prepare($sql);
		$resultado->execute();

		$res = $resultado->fetchAll();
		//var_dump($res);

		return $res;
	}
?>

