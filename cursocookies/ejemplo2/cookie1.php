<?php 
	if(isset($_COOKIE["visita"])){
		echo "Qué alegría verte de nuevo por aquí";
	}else{
		setcookie("visita", "ok", time() + 31536000);
		echo "Bienvenido a mi página por primera vez";
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 1</title>
</head>
<body>

</body>
</html>