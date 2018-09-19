<?php 
	
	include "db/database_utilities.php";

	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';  //Se revisa que el id del usuario se encuentre mediante el metodo get.
	echo $id;
	$r = search($id);//Se realiza una busqueda en la base de datos donde se obtienen los atributos del registro con el id ingresado.

	//Si se escribió un campo lo actualiza, ya que todos los campos son obligatorios
	if(isset($_POST["nombre"])){
		$tipo = $_POST["id_type"];
		if($tipo == "Futbolista") { $tipo=1; }
		else $tipo = 2;
		//Se pasan todos los parámetros necesarios para actualizar con update
		update($id, $_POST["nombre"], $_POST["posicion"], $_POST["carrera"], $_POST["email"], $tipo);
		header("Location: index.php"); // Se redirije al index
	}

 ?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Modificar </title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Modificar datos <?php echo "<br> <b>".$r['nombre'].":  ".$r['id']."</b>"; ?></h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">

          	<?php 
          		//Tipo: 1 si es Futbolista, caso contrario Tipo=2
          		$tipo = 'tipo';
          		if($r['id_type'] == 1) { $tipo = "Futbolista"; }
          		else $tipo = "Basquetbolista";
          	 ?>

            <div class="content" data-slug="panel1">
                <form method="POST" action="update.php?id=<?php echo($id)?>">                  
                  
                  <label for="nombre">Nombre:</label>
                  <input type="text" name="nombre" required value="<?php echo($r['nombre'])?>"><br>

                  <label for="posicion">Posicion:</label>
                  <input type="text" name="posicion" required value="<?php echo($r['posicion'])?>"><br>

                  <label for="carrera">Carrera:</label>
                  <input type="text" name="carrera" required value="<?php echo($r['carrera'])?>"><br>
                  
                  <label for="email">Email:</label>
                  <input type="email" name="email" required value="<?php echo($r['email'])?>"><br>

                  <label for="tipo">Tipo:</label>
                  <input type="text" name="id_type" required value="<?php echo($tipo)?>"><br>
                  
                  <button type="submit" class="success">Actualizar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>

