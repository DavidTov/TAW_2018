 <?php 


  // Si la matricula está repetida regresa a esta página con una variable GET
    if(isset($_GET["action"])){
      if($_GET["action"] == "matriculaExiste"){        
        echo "<script> alert('La matrícula ya existe!'); </script>";
      }
    }

 	# FORMULARIO PARA REGISTRO
 	

    // Se crea un objeto del tipo controller    
    $mvc = new controller();

    // Se llama al método para obtener los datos de las carreras
    $carreras = $mvc->datosUsuariosController("carreras");
    $contCarreras = count($carreras); // cuenta los registros encontrados


    $tutores = $mvc->datosUsuariosController("tutores");
    $contTutores = count($tutores); // cuenta los registros encontrados


 		// Se muestra un formulario html, cierra la llave despues del form
  ?>


  <!-- Todo está está centrado <center> -->

  <center>
  <br><br><br>
  <form method="POST">
  	<label> Matricula </label>
  	<input type="text" name="matricula" placeholder="Ingrese la matricula" required>
  	<br><br>

  	<label>Nombre del alumno</label>
  	<input type="text" name="nombre" placeholder="Nombre completo del alumno" required>
  	<br><br>

  	<label>Carrera</label>

  	<select name="carrera">  		
  		<?php   
        // Se elige la carrera		
  			for($i=0; $i<$contCarreras; $i++){
  				echo "<option>" . $carreras[$i]["nombreCarrera"] . "</option>";
  			}
  		 ?>
  	</select>

  	<br><br>

  	<label>Situación académica</label>
  	<select name="situacion">
  		<option>Regular</option>
  		<option>Especial</option>  		
  	</select>
  	<br><br>

  	<label>Email</label>
  	<input type="email" name="email" placeholder="Email" required>
  	<br><br>

  	<label>Tutor</label>
  	<select name="tutor">
  		<?php   
        // Se elige el tutor
        for($i=0; $i<$contTutores; $i++){
          echo "<option>" . $tutores[$i]["nombreTutor"] . "</option>";
        }
       ?>
  	</select>
  	<br><br>

  	<label>Foto</label>
    <input type="file" name="userPhoto">
  	<br><br>

  	<input type="submit" name="registroAlumno" value="Registrar Alumno">
  </form>
</center>


<?php 
	// Cierre de la llave
	

	// Fin FORMULARIO
 ?>



  <?php 

  // Si se oprimió el botón de "Registrar alumno"
  if(isset($_POST["registroAlumno"])){
    // Se crea un objeto del tipo controller
    $mvc = new controller();

    // Si la matricula ya existe
    if($mvc->verificaMatriculaController()){
      // Se llama al método del controller para agregar un alumno
      $mvc->registroAlumnoController();
    }       
  }

  


  ?>