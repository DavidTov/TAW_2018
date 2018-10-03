<?php 

	class conectar{
		public static function conexion(){
			$conexion = new mysqli("localhost", "root", "", "ejemplo_mvc");
			$conexion->query("SET NAMES 'utf8'");
			return $conexion;
		}
	}

 ?>