<!-- Esta es la plantilla que el usuario verá al ejecutar la aplicación -->

<!DOCTYPE html>
<html>
<head>
	<title> Plantilla </title>
	<style type="text/css">
		
		header {
			position: relative;
			margin: auto;
			text-align: center;
			padding: 5px;
		}

		nav{
			position: relative;
			margin: auto;
			width: 100%;
			height: auto;
			background: black;
		}

		nav ul{
			position: relative;
			margin: auto;
			width: 50%;
			text-align: center;	
		}

		nav ul li{
			display: inline-block;
			width: 24%;
			line-height: 50px;
			list-style: none;
		}

		nav ul li a{
			color: white;
			text-decoration: none;			
		}

		section{
			position: relative;
			/*padding: 20%;*/
			margin: auto;
			width: 400px;
		}

		section h1{
			position: relative;
			margin: auto;
			padding: 10px;
			text-align: center;			
		}

		section form{
			position: relative;
			margin: auto;
			width: 400px;			
		}

		section form input{
			display: inline-block;
			padding: 10px;
			width: 95%;
			margin: 5px;
		}

		section form input[type="submit"]{
			position: relative;
			margin: 20px auto; 
			left: 4.5%;
		}

		table{
			position: relative;
			margin: auto;
			width: 100%;
			left: -10%;
		}

		table thead tr th{
			padding: 10px;
		}

		table tbody tr td{
			padding: 10px;
		}
	</style>

</head>
<body>

	<header> <h1> TAW - PHP MVC </h1> </header>
	<?php include "modules/navegacion.php"; ?>

	<section>
	<?php 
		//Mostraremos un controlador que muestra la plantilla
		$mvc = new MvcController();
		//Mostramos la función
		$mvc->enlacesPaginasController();
	 ?>
	 </section>

</body>
</html>