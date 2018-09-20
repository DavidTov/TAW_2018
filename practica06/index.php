<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Práctica 06 </title>

</head>
<body>
	<h1> Iniciar sesión </h1>
	<div class="row">
 
      <div class="large-9 columns">
        <h3>Modificar Jugador</h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                
                  <form method="POST" action="iniciar_sesion.php">
                
                  <label for="id">Matricula:</label>
                  <input type="text" name="id" placeholder="Ingresa Matricula" required><br>
                  <label for="contrasena">Contraseña:</label>
                  <input type="password" name="password" placeholder="Ingrese contraseña" required=""><br>
                  
                  <button type="submit" class="success" onClick="">Modificar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
</body>
</html>