<?php 
	

	include 'db/database_utilities.php';

	$id = $_GET["id"];
	$email = $_GET["e"];
	$status = $_GET["s"];
	$type = $_GET["t"];

	// Se obtiene la fecha actual formto: año-Mes-Dia(####-##-##);
	$date = date("Y-m-d");

	// Se agrega un registro a log una vez iniciada la sesión
	// Se le pasan los parámetros de fecha actual y id de usuario
	add_log($date, $id);


 ?>


 <!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Perfil de usuario </title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3> Perfil de usuario </h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
            	<br><h4> <?php echo "<b>Bienvenido!</b>"; ?> </h4>
                <?php 
                	

                	echo "ID: " . $id . "<br>";
                	echo "Email: " . $email . "<br>";
                	echo "Status: " . $status . "<br>";
                	echo "Tipo de usuario: ";

                	// Si tipo=1 es admin, sino es normal
                	if($type==2){ echo "Administrador"; }
                	else{ echo "Normal"; }
                			
                	
                	
                 ?>

            </div>
            <br>
            <?php if($type==2){?>
            	<?php // Solo el administrador puede ver los usuario normales y modificarlos ?>
            	<b> <a href="listado_user.php"> Ver lista de usuarios </a> </b> <br>
            <?php }else{ ?>
                <b> <a href="update_user.php?id=<?php echo($id); ?>"> Modificar datos </a> </b> <br>

            <?php } ?>
            <a href="index.php"> Cerrar Sesión </a>
          </section>
        </div>
      </div>
    </div>


     
    <?php require_once('footer.php'); ?>