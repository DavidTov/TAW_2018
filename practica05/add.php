<?php 
	
	include 'db/database_utilities.php';

  //Si se escribió un campo lo actualiza, ya que todos los campos son obligatorios
	if (isset($_POST["nombre"])) {
    //Tipo: 1 si es Futbolista, caso contrario Tipo=2
		$tipo = $_POST["tipo"];
		if($tipo == "Futbolista") { $tipo=1; }
		else $tipo = 2;

    //Se pasan todos los parámetros necesarios para agregar con add
		add($_POST["matricula"], $_POST["nombre"], $_POST["posicion"], $_POST["carrera"], $_POST["email"], $tipo);
		header("Location: index.php");
	}


 ?>

 <!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Agregar Nuevo Jugador</h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                <form method="POST" action="add.php">
                  <label for="matricula">Matricula:</label>
                  <input type="text" name="matricula" required placeholder="Ingresa matricula"> <br>

                  <label for="nombre">Nombre:</label>
                  <input type="text" name="nombre" required placeholder="Ingresa nombre"> <br>
                  
                  <label for="posicion">Posición:</label>
                  <input type="text" name="posicion" required placeholder="Ingresa posicion"> <br>
                  
                  <label for="carrera">Carrera:</label>
                  <input type="text" name="carrera" required placeholder="Ingresa carrera"> <br>
                  
                  <label for="email">Email:</label>
                  <input type="email" name="email" required placeholder="Ingresa email"> <br>
                  
                  <label for="tipo">Tipo:</label>
                  <input type="text" name="tipo" required placeholder="Futbolista o basquetbolista"> <br>
                  
                  <button type="submit" class="success">Guardar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>