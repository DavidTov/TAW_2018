<?php 

	echo "<center><h1>usuarios</h1></center>";

	// Se declara un objeto del tipo MvcController
	$mvc = new MvcController();

	// Se manda llamar al método
	$datos = $mvc->datoUsuarioController();

	// Se cuenta el numero de registros de la variable
	$cont = count($datos);

	// Si está activa la sesión se imprime un mensaje de bienvenida
	if($_SESSION){
		$usuario = $_SESSION["usuario"];
		echo "Bienvenido: " . $usuario . "<br>";
	}else{
		// Sino está iniciada la sesión no puede ver la página de usuarios y se reedirecciona al index
		header("Location:index.php");
	}

 ?>

<!-- Se imprime la tabla con los valores de los usuarios -->
<br><br>
<center>
<table>
	<thead>
		<th>ID</th>
		<th>USUARIO</th>		
		<th>EMAIL</th>
		<th>EDITAR</th>
		<th>ELIMINAR</th>
	</thead>
	<tbody>
		<?php 
			// Se imprimen a través del ciclo los datos de los usuarios registrados
			for($i=0; $i<$cont; $i++){
				echo "<tr>";
				echo "<td>" . $datos[$i]["id"] . "</td>";
				echo "<td>" . $datos[$i]["usuario"] . "</td>";
				echo "<td>" . $datos[$i]["email"] . "</td>";

				$id = $datos[$i]["id"];
		 ?>
		       <!-- Se redirecciona con GET al archivo correspondiente de editar y eliminar usuario -->
		       <td><a href="index.php?action=editar&id=<?php echo($id) ?>" ><button>Editar</button></a></td>

		       <td><a href="index.php?action=eliminar&id=<?php echo($id) ?>"> <button>Eliminar</button></a></td>

		       </tr>
		<?php 
			}
		 ?>		 
	</tbody>
</table>
</center>