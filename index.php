<?php  
require_once('utilidades.php');
/*
require_once("conexion.php");
$query = "SELECT * FROM productos";
$datos = ObtenerRegistros($query);
echo "<pre>";
echo "Resultados demo de la API <br>";
print_r($datos);
echo "</pre>";
*/
/*
	ENLACE AL CURSO: https://www.youtube.com/playlist?list=PLIbWwxXce3VoAMUd6R1yI6oR23zz7MkkE
*/


/* Si existe la variable get */
if (isset($_GET['url'])) {
	
	$var = $_GET['url'];

	$numero = intval(preg_replace('/[^0-9]+/','',$var),10);
	/* CONFIGURANDO RUTAS */
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		switch ($var) {
			case 'productos':
				$datos = allProductos();
				echo "<pre>";
				echo json_encode($datos);
				echo "<pre>";
				http_response_code(200);
				break;
			case 'productos/'.$numero:
				$datos = getProducto($numero);
				if (empty($datos)) {
					echo "No existe registro";
				}else{
					echo "<pre>";
					echo json_encode($datos);
					echo "<pre>";
				}
				http_response_code(200);
				break;
			default:
				echo "No existe la ruta..";
				http_response_code(404);
				break;
		}
	}elseif($_SERVER['REQUEST_METHOD'] == 'POST'){

		$postBody = file_get_contents('php://input');
		$convert = json_decode($postBody);
		if (json_last_error()==0) {
			switch ($var) {
				case 'productos':
					CrearProducto($convert);
					http_response_code(200);
					break;
				
				default:
					echo "No existe la ruta";
					http_response_code(404);
					break;
			}
		}
	}else{

		http_response_code(405);

	}	

}else{ ?>
	<link rel="stylesheet" href="public/css/estilos.css">
	<body>
		<div class="container">
			<h1>MetaData</h1>
			<div class="divbody">
				<p>Productos</p>
				<code>
					POST: /productos
				</code>
				<code>
					GET: /productos
					<br>
					GET: /Productos/$id
				</code>
			</div>
		</div>
	</body>
<?php } ?>