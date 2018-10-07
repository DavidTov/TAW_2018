<?php 

	echo "<center><h1>usuarios</h1></center>";

	$mvc = new MvcController();

	$datos = $mvc->datoUsuarioController();

	$cont = count($datos);

	if($_SESSION){
		$usuario = $_SESSION["usuario"];
		echo "Bienvenido: " . $usuario . "<br>";
	}else{
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
			for($i=0; $i<$cont; $i++){
				echo "<tr>";
				echo "<td>" . $datos[$i]["id"] . "</td>";
				echo "<td>" . $datos[$i]["usuario"] . "</td>";
				echo "<td>" . $datos[$i]["email"] . "</td>";

				$id = $datos[$i]["id"];
		 ?>
		       
		       <td><a href="index.php?action=editar&id=<?php echo($id) ?>" ><button>Editar</button></a></td>

		       <td><a href="index.php?action=eliminar&id=<?php echo($id) ?>"> <button>Eliminar</button></a></td>

		       </tr>
		<?php 
			}
		 ?>		 
	</tbody>
</table>
</center>