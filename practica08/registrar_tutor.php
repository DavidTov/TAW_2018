<?php 

	include "db/database_utilities.php";


	echo "Registro de tutores <br><br>";



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title> Registro tutor </title>
 </head>
 <body>

 	<?php $res = seleccionarCarrera(); 
 	$cont = count($res);
 	?>
 	<form action="registrar_tutor.php" method="POST">
 		<label>Nombre </label>
 		<input type="text" name="nombreTutor" placeholder="nombre tutor" required>


 		<select name="select">
 			<?php 
 				for($i=0; $i<$cont; $i++) {
 					echo "<option>";
 					echo $res[$i]["nombreCarrera"];
 					echo "</option>";
 				}

 			 ?>
 		</select>
 	</form>
 </body>
 </html>

 <?php 

 		 
 	//seleccionarCarrera();
 		

 			 
  ?>