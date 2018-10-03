<?php 

	include "db/database_utilities.php";

	echo "Datos de los usuarios";
	echo "<br>";

	$alumnos = getAll();
	$cont = count($alumnos);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title> Alumnos y tutores </title>
 </head>
 <body>
 	<br><br>
 	<table border="3px;">
 		<thead>
 			<th> ID </th>
 			<th> Alumno </th>
 			<th> Carrera </th>
 			<th> Tutor </th>
 		</thead>
 		<tbody>
			<?php 
				for($i=0; $i<$cont; $i++){
					echo "<tr>";
					echo "<td>" . $alumnos[$i]["matricula"] . "</td>";
					echo "<td>" . $alumnos[$i]["nombreAlumno"] . "</td>";
					echo "<td>" . $alumnos[$i]["nombreCarrera"] . "</td>";
					echo "<td>" . $alumnos[$i]["nombreTutor"] . "</td>";
					echo "</tr>";
				}
			 ?>
 		</tbody>
 	</table>


 	<br>
 	<a href="registrar_carrera.php"> Registrar carrera </a><br>
 	<a href="registrar_tutor.php"> Registrar tutor </a><br>
 	<a href="registrar_alumno.php"> Registrar alumno </a><br>
 </body>
 </html>
