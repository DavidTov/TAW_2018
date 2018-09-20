<?php 
	
	include 'db/database_utilities.php';


	// Si la variable POST[email] está seteada. Todos los campos del formulario son pbligatorios
	if(isset($_POST["email"])) {   


		$email = $_POST["email"];
		$password = $_POST["password"];

	    // Si los datos son correocto se almacena el registro, si no se le asigna null
	    $registro = validar($email, $password); 

	    $id = $registro["id"];
	    $status = $registro["status_id"];
	    $type = $registro["user_type_id"];


	    // Si no es null trae el registro correspondiente a los parámetros
	    // Redirecciona a sesion_iniciada.php
		if($registro != null){
			// Se pasan los parámetros con la url con GET. (r: email, id, status, id_type).
			header("Location: sesion_iniciada.php?id=$id&e=$email&s=$status&t=$type");

		}else{
			// Se muestra un alert en caso de que validar sea null
			echo "<script> alert('Usuario o contraseña incorrectos!'); </script>";			
		}				
	}


 ?>

 <!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Inciar Sesión </title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3> Inicio de sesión </h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                <form method="POST" action="validar_sesion.php">
                  <label for="email">Email:</label>
                  <input type="email" name="email" required placeholder="Ingresa email"> <br>

                  <label for="nombre">Contraseña:</label>
                  <input type="password" name="password" required placeholder="Ingresa contraseña"> <br>
                  
                  <button type="submit" class="success"> Ingresar </button>
                </form>
                <a href="registro_user.php"> Aún no tienes una cuenta? Registrate aquí </a>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>