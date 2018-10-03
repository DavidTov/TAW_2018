<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Vista - Personas </title>
</head>
<body>
	<?php 		
		foreach($datos as $dato){
			echo $dato["nombre"] . "<br>";
		}
	 ?>
</body>
</html>