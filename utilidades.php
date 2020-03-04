<?php  
require_once('conexion.php');

/*FUNCIONES PARA LAS API's*/

//Obtener todos los productos
function allProductos()
{
	$query = "SELECT * FROM productos";
	$datos = ObtenerRegistros($query);
	return ConvertirUtf8($datos);
}

//Obtener un producto
function getProducto($id)
{
	$query = "SELECT * FROM productos WHERE ProductoId = ".$id." ";
	$datos = ObtenerRegistros($query);
	return ConvertirUtf8($datos);
}

function CrearProducto($array){
	$nombre = $array[0]->nombre;
	$codigo = $array[0]->codigo;
	$presentacion = $array[0]->presentacion;
	
	$query = "INSERT INTO productos (Nombre, Codigo, Presentacion) VALUES ('".$nombre."', '".$codigo."', '".$presentacion."')";
	if (NonQuery($query)>0) {
		echo "Guardo Exitosamente!";
	}else{
		echo "No guardo.";
	}
}

?>