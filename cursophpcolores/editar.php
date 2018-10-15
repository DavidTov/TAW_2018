<?php 
	
	include 'conexion.php';

	if($_GET){
		$id = $_GET["id"];
		$color = $_GET["color"];
		$descripcion = $_GET["descripcion"];


		// Sentencia sql
		$sql_editar = "UPDATE colores SET color=?,descripcion=? WHERE id=?";
		$stmt = $pdo->prepare($sql_editar);

		if($stmt->execute(array($color,$descripcion,$id))){
			header("location:index.php");			
		}else{
			echo "Hubo un error, no se actualizó el registro";
		}
	}


 ?>