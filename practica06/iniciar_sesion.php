<?php 

	include "db/database_utilities.php";

	if (isset($_POST["id"])) {
		if(iniciarSesion($_POST["id"], $_POST["password"])){
			echo "Chido";
		}
	}

 ?>