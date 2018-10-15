<?php setcookie("nombre",$_COOKIE["nombre"], time() - 4800);
	
	// También puede ser así
	// setcookie("nombre","", time() - 1000);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 1d</title>
</head>
<body>
	<a href="cookie1c.php">Verificar</a>
</body>
</html>
