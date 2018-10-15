<?php 

$fecha = date("d/m/Y | H:i:s");

setcookie("fecha", $fecha, time()+31536000);

// Si existe la cookie mostrar mensaje
if(isset($_COOKIE["fecha"])){
	echo "Hola de nuevo, tú última visita fue el " . $_COOKIE["fecha"];
}else{
	echo "Esta es tu primera visita";
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Ejercicio cookie 3</title>
 	<meta charset="utf-8">
 </head>
 <body>
 
 </body>
 </html>