<?php 

if(isset($_POST["color"])){
	$color = $_POST["color"];
	setcookie("color", $color, time()+100000);
}else{
	if(isset($_COOKIE["color"])){
		$color = $_COOKIE["color"];
	}else{
		// fondo por defecto
		$color = "white";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio cookie 5</title>
</head>
<body <?php echo "style='background-color:$color'"; ?>>
	<form method="POST" action="cookie5.php">
		
		<label for="color">Escoge tu color de fondo</label>

		<select name="color">
			<option value="red">Rojo</option>
			<option value="blue">Azul</option>
			<option value="green">Verde</option>
			<option value="yellow">Amarillo</option>
			<option value="silver">Gris</option>
			<option value="black">Negro</option>

			<input type="submit" value="Cambiar color!">
		</select>
	</form>
</body>
</html>