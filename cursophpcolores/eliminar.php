<?php 

	include 'conexion.php';
	
	if($_GET){
		$id = $_GET["id"];

		$sql_eliminar = "DELETE FROM colores WHERE id=?";
		$stmt = $pdo->prepare($sql_eliminar);

		if($stmt->execute(array($id))){
			header("location:index.php");
		}else{
			echo "Hubo un error, no se eliminó el registro";
		}

	}



 ?>