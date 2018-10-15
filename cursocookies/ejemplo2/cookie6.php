<?php 

// Cookie definida como un array
// para guardar arrays.. ..en setcookie el nombre y el índice de un array

// Para leer las cookies.. .. bastará con leer el array devuelto

// una cookie también puede contener varios valores agrupados en un array


$persona = array("Pedro", "Pérez", "26", "Madrid", "abcde");

setcookie("micookie[nombre]", $persona[0], time()+3600);

setcookie("micookie[apellido]", $persona[1], time()+3600);

setcookie("micookie[edad]", $persona[2], time()+3600);

setcookie("micookie[ciudad]", $persona[3], time()+3600);

setcookie("micookie[password]", $persona[4], time()+3600);


echo "<br> El nombre es: ".$_COOKIE["micookie"]["nombre"];

echo "<br> El apellido es: ".$_COOKIE["micookie"]["apellido"];

echo "<br> El edad es: ".$_COOKIE["micookie"]["edad"];

echo "<br> El ciudad es: ".$_COOKIE["micookie"]["ciudad"];

echo "<br> El password es: ".$_COOKIE["micookie"]["password"];
 ?>