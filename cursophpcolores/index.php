<?php 

include "conexion.php";


// LEER contenido de la tabla colores
$sql = "SELECT * FROM colores";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll();

//var_dump($resultado);


// AGREGAR REGISTROS A LA TABLA colores
if($_POST){
	$color = $_POST["color"];
	$descripcion = $_POST["descripcion"];

	$sql_agregar = "INSERT INTO colores (color,descripcion) VALUES(?,?)";
	$sentencia_agregar = $pdo->prepare($sql_agregar);

	$sentencia_agregar->execute(array($color,$descripcion));

	header("location:index.php");
}


if($_GET){
	$id = $_GET["id"];	

	$sql_unico = "SELECT * FROM colores WHERE id=?";
	$stmt_unico = $pdo->prepare($sql_unico);

	$stmt_unico->execute(array($id));

	$resultado_unico = $stmt_unico->fetch();	
}

 ?>



<!-- Starter Template -->

 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>    


   <!-- AQUÍ COMIENZA LA EDICIÓN-->
    <div class="container mt-5">
    	<div class="row">
    		<div class="col-md-6">
    			<?php foreach($resultado as $dato): // dos puntos queda abierto para que se cierre posteriormente ?>
    			
    			<div class="alert alert-<?php echo $dato["color"]; ?> role=alert">
  					<?php echo $dato["color"]; ?>
  					- 
  					<?php echo $dato["descripcion"]; ?>


  					<!-- Icono de eliminar -->
  					<a href="eliminar.php?id=<?php echo($dato["id"]); ?>" class="float-right ml-3">
  						<i class="fas fa-trash-alt"></i>
  					</a>

  					<!-- Icono de editar -->
  					<a href="index.php?id=<?php echo($dato["id"]); ?>" class="float-right">
  						<i class="fas fa-pen-alt"></i>
  					</a>
  					
				</div>	
				
				<?php endforeach ?>
    		</div>

    		<div class="col-md-6">
    		<?php if(!$_GET): //Dos puntos queda abierto hasta el cierro ?>
    			<h2>AGREGAR ELEMENTOS</h2>
    			<form method="POST">
    				<input type="text" class="form-control" name="color">
    				<input type="text" class="form-control mt-3" name="descripcion">
    				<button class="btn btn-primary mt-3">Agregar</button>
    			</form>
    		<?php endif ?>

    		<?php if($_GET): //Dos puntos queda abierto hasta el cierro ?>
    			<h2>EDITAR ELEMENTOS</h2>
    			<form method="GET" action="editar.php">
    				<input type="text" class="form-control" name="color" value="<?php echo($resultado_unico["color"])?>">
    				<input type="text" class="form-control mt-3" name="descripcion" value="<?php echo($resultado_unico["descripcion"])?>">
    				<input type="hidden" name="id" value="<?php echo($resultado_unico["id"]) ?>">
    				<button class="btn btn-primary mt-3">Editar</button>
    			</form>
    		<?php endif ?>

    		</div>
    	</div>    	
    </div>
	<!-- AQUÍ TERMINA LA EDICIÓN-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>