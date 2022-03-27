<?php
require_once  __DIR__.'/db/conexion.php';

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

function CrearProducto($datos){
	$mensaje = '';
    $nombre =  escaparCadenas($datos["nombre"]);
	$codigo =  escaparCadenas($datos["codigo"]);
	$presentacion =  escaparCadenas($datos["presentacion"]);
	$query = "INSERT INTO productos (Nombre, Codigo, Presentacion) VALUES ('".$nombre."', '".$codigo."', '".$presentacion."')";
	if (NonQuery($query)>0) {
		$mensaje = "Guardo Exitosamente!";
	}else{
		$mensaje = "No guardo.";
	}
	return $mensaje;
}

function ActualizarProducto(array $datos){
	$nombre = $datos["nombre"];
	$codigo = $datos["codigo"];
	$presentacion = $datos["presentacion"];
	$productoId = $datos["ProductoId"];
	$query = "UPDATE productos SET Nombre = '{$nombre}', Codigo = $codigo, Presentacion = '{$presentacion}' WHERE ProductoId = $productoId";
	if (NonQuery($query)>0) {
		$mensaje = "Actualizado Exitosamente!";
	}else{
		$mensaje = "No Actualizado.";
	}
	return $mensaje;
}

function DeleteProducto(array $datos)
{
	$productoId = $datos["ProductoId"];
	$query = "DELETE FROM productos WHERE ProductoId = $productoId";
	if (NonQuery($query)>0) {
		$mensaje = "Eliminado Exitosamente!";
	}else{
		$mensaje = "No se pudo eliminar.";
	}
	return $mensaje;
}
