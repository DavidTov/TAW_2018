<?php 
	
	include "db/database_utilities.php";

	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';  //Se revisa que el id del usuario se encuentre mediante el metodo get.
	echo $id;
	$r = search($id);//Se realiza una busqueda en la base de datos donde se obtienen los atributos del registro con el id ingresado.

	//Si se escribió un campo lo actualiza, ya que todos los campos son obligatorios
	if(isset($_POST["password"])){
		echo "<br>".$r['id'];

    $status = (int)$_POST["status"];
		//Se pasan todos los parámetros necesarios para actualizar con update
		update_user($id, $_POST["password"], $status);
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
        <h3>Modificar datos de usuario <?php echo "<br> <b>".$r['email']."</b>"; ?></h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">          

            <div class="content" data-slug="panel1">
                <form method="POST" action="update_user.php?id=<?php echo($id)?>">                  
                  
                  <label for="password">Contraseña:</label>
                  <input type="password" name="password" required ><br>                

                  <label for="status">Status:</label>
                  <select name="status" required>                  
                  <option value="1"> 1 </option>
                  <option value="2"> 2 </option>          
                  </select> <br> <br>
                  
                  <button type="submit" class="success">Actualizar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>

