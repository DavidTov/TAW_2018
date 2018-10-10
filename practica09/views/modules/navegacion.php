<nav>
	<ul>		
		<li><a href="index.php?action=alumnos"> Alumnos </a></li>
		<li><a href="index.php?action=tutores"> Tutores </a></li>
		<li><a href="index.php?action=carreras"> carreras </a></li>
		<li><a href="index.php?action=salir"> salir </a></li>
		<?php 
			// Imprimir el nombre de usuario con $_SESSION
			echo "<li> Bienvenido <strong>". $_SESSION["usuario"] ."</strong></li>";
		 ?>
	</ul>
</nav>