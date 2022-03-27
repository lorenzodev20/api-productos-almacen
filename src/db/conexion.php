<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_almacenes";
$port 	="3306";

// Create connection
$conexion = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}else{
	//echo "Connected successfully";

	//Funciones de APi

	/* Guardar, Modificar, Eliminar */
	function NonQuery($sqlstr, &$conexion = null)
	{
		if (!$conexion)global $conexion;
		$result =$conexion->query($sqlstr);
		return $conexion->affected_rows;
	}
	function ObtenerRegistros($sqlstr, &$conexion = null)
	{
		if (!$conexion)global $conexion;
		$result =$conexion->query($sqlstr);	
		$resultArray = array();
		foreach ($result as $registros) {
			$resultArray[] = $registros;
		}

		return $resultArray;
	}

	//Convertir a utf-8
	function ConvertirUtf8($array){
		array_walk_recursive($array,function(&$item,$key){
			if (!mb_detect_encoding($item,'utf-8',true)) {
				$item = utf8_encode($item);
			}
		});
		return $array;
	}

	function escaparCadenas($cadena, &$conexion = null)
	{
		if (!$conexion)global $conexion;
		return $conexion->real_escape_string($cadena);
	}
}
?>