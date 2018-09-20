<?php 
	
	include 'db/database_utilities.php';


	// Si la variable POST[email] está seteada. Todos los campos del formulario son pbligatorios
	if(isset($_POST["email"])) {   

		// Se pasan las variables por el método post
		$email = $_POST["email"];
		$password = $_POST["password"];
	   	   
	    $status = (int)$_POST["status"];
	    $type = $_POST["r_button"];

	    // user_type=2 es admin, si es 1 es normal
	    if($type == "Admin") { $type = 2; }
	    else { $type=1; }	    


	    //Registrar el nuevo usuario
	    add_user($email, $password, $status, $type);

	    
	    			
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
        <h3> Registro de usuarios </h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                <form method="POST" action="registro_user.php">
                  <label for="email">Email:</label>
                  <input type="email" name="email" required placeholder="Ingresa email"> <br>

                  <label for="nombre">Contraseña:</label>
                  <input type="password" name="password" required placeholder="Ingresa contraseña"> <br>

                  <label for="status"> Status </label>
                  <select name="status" required>
        				  <option value="" > Seleccionar </option>
        				  <option value="1"> 1 </option>
        				  <option value="2"> 2 </option>				  
        				  </select> <br> <br>

				  <label for="tipo"> Tipo de usuario </label>
                  <input type="radio" name="r_button" required value="normal"> Usuario normal <br>
  				  <input type="radio" name="r_button" required value="Admin"> Administrador <br> <br>
                  
                  <button type="submit" class="success"> Registrarse </button>
                </form>
                <a href="validar_sesion.php"> Ya tienes una cuenta? Inicia sesión </a>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>