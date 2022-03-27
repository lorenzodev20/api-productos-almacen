<?php
/**
 * Funciones adicionales de la api
 */

function validarCamposProducto(array $datos, $tipo = 0)
{
    $msj = '';
    $result = true;
    $nombre =  escaparCadenas($datos["nombre"]);
	$codigo =  escaparCadenas($datos["codigo"]);
	$presentacion =  escaparCadenas($datos["presentacion"]);

    if ($tipo == 1) {
        $productoId = escaparCadenas(((empty($datos["ProductoId"]))?0:$datos["ProductoId"]));
        if ($productoId<=0 && $result) {
            $msj = "El campo productoId es obligatorio";
            $result = false;
        }
    }
    if (empty($nombre) && $result) {
        $msj = "El campo nombre es obligatorio";
        $result = false;
    }
    if (empty($codigo) && $result) {
        $msj = "El campo codigo es obligatorio";
        $result = false;
    }
    if (empty($presentacion) && $result) {
        $msj = "El campo presentación es obligatorio";
        $result = false;
    }


    return array("result" => $result, "msj" => $msj);
}