<?php 

	/* EDITAR LOS DATOS DE UN ALUMNO */


    // Si se oprimió el botón de actualizar alumno
  if(isset($_POST["editarAlumno"])){
    // Se crea un objeto del tipo controller para editar los datos
    $mvc = new controller();

    // SE llama al método del controlador para editar alumno
    
  }


	// Si se oprimió el botón de editar en la tabla de alumnos, con GET obtiene el id
	if(isset($_GET["id"])){
		// Se crea un objeto del tipo controller
		$mvc = new controller();

		// Se llama al método del controller para obtener un registro con todos sus campos
    // get controller sobrecarga del método
		$alumno = $mvc->getAllController($_GET["id"]);

    // Obtener los datos de las carreras para mostrarlas en el select de abajo
    $carreras = $mvc->datosUsuariosController("carreras");
    $contCarreras = count($carreras);


    // Obtener los datos de las carreras para ponerlas en el select
    $tutores = $mvc->datosUsuariosController("tutores");
    $contTutores = count($tutores);
	}
	
 ?>

<!-- FORMULARIO CENTRADO PARA EDITAR EL ALUMNO -->
<center>
<br><br><br>
	<h3> Editar alumno </h3>
  <form method="POST" >
  	<label> Matricula </label>
  	<input type="text" name="matricula" placeholder="Ingrese la matricula" value="<?php echo($alumno["matricula"]) ?>" required>
  	<br><br>

  	<label>Nombre del alumno</label>
  	<input type="text" name="nombre" placeholder="Nombre completo del alumno" value="<?php echo($alumno["nombre"]) ?>" required>
  	<br><br>

  	<label>Carrera</label>

  	<select name="carrera">  		
  		<?php 
  			//El que tiene el usuario
  			echo "<option>". $alumno["nombreCarrera"] ."</option>";
        // Se elige la carrera		
  			for($i=0; $i<$contCarreras; $i++){
  				echo "<option>" . $carreras[$i]["nombreCarrera"] . "</option>";
  			}
  		 ?>
  	</select>

  	<br><br>

  	<label>Situación académica</label>
  	<select name="situacion">
  		<?php 
  			echo "<option>". $alumno["situacionAcademica"] ."</option>";
  		 ?>
  		<option>Regular</option>
  		<option>Especial</option>  		
  	</select>
  	<br><br>

  	<label>Email</label>
  	<input type="email" name="email" placeholder="Email" value="<?php echo($alumno["email"]) ?>" required>
  	<br><br>

  	<label>Tutor</label>
  	<select name="tutor">
  		<?php   
  			// El que tiene el usuario
        echo "<option>". $alumno["nombreTutor"] ."</option>";
        // Se elige el tutor
        for($i=0; $i<$contTutores; $i++){
          echo "<option>" . $tutores[$i]["nombreTutor"] . "</option>";
        }
       ?>
  	</select>
  	<br><br>

  	<label>Foto</label>
    <input type="foto" name="foto" value="<?php echo($alumno["foto"]) ?>">
  	<br><br>

  	<input type="submit" name="editarAlumno" value="Actualizar datos del Alumno">
  	<br><br>
  </form>
</center>



<?php 


 ?>