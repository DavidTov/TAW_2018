<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio cookie 1c</title>
</head>
<body>


<?php 

// Si la cookie existe imprime el valor
 if(isset($_COOKIE["nombre"])){
 	echo "La cookie tiene el valor: " . $_COOKIE["nombre"];
 }else{
 	echo "La cookie no fue encontrada";
 }

 ?>
 <a href="cookie1d.php">Salir</a>
 </body>
</html>
