<?php
require_once  __DIR__.'/src/consultas_db.php';
require_once  __DIR__.'/src/helpers.php';

header('Content-Type: application/json');
header("Access-Control-Allow-Methods: PUT, POST, GET, DELETE");

ini_set('error_reporting', E_ALL);

/* Si existe la variable get */
if (isset($_GET['url'])) {
	$var = $_GET['url'];

	$numero = intval(preg_replace('/[^0-9]+/', '', $var), 10);
	/* CONFIGURANDO RUTAS */
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		switch ($var) {
			case 'productos':
				$datos = allProductos();
				echo json_encode($datos);
				http_response_code(200);
				break;
			case 'productos/' . $numero:
				$datos = getProducto($numero);
				if (empty($datos)) {
					echo "No existe registro";
				} else {
					echo json_encode($datos);
				}
				http_response_code(200);
				break;
			default:
				echo "No existe la ruta..";
				http_response_code(404);
				break;
		}
	} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$postBody = file_get_contents('php://input');
		$convert = json_decode($postBody);
		if (json_last_error() == 0) {
			switch ($var) {
				case 'productos':
					$rps = validarCamposProducto(get_object_vars($convert));
					if (!$rps["result"]) {
						$respuesta =[
							"code" => http_response_code(400),
							"msj" => $rps["msj"]
						];
						echo json_encode($respuesta);
					}else{
						$rps = CrearProducto(get_object_vars($convert));
						$respuesta =[
							"code" => http_response_code(200),
							"msj" => $rps
						];
						echo json_encode($respuesta);
					}

					break;
				default:

					$respuesta =[
						"code" => http_response_code(404),
						"msj" => "No existe la ruta"
					];
					echo json_encode($respuesta);

					break;
			}
		}
	} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {

		$postBody = file_get_contents('php://input');
		$convert = json_decode($postBody);
		if (json_last_error() == 0) {
			switch ($var) {
				case 'productos':
					$rps = validarCamposProducto(get_object_vars($convert),1);
					if (!$rps["result"]) {
						$respuesta =[
							"code" => http_response_code(400),
							"msj" => $rps["msj"]
						];
						echo json_encode($respuesta);
					}else{
						$rps = ActualizarProducto(get_object_vars($convert));
						$respuesta =[
							"code" => http_response_code(200),
							"msj" => $rps
						];
						echo json_encode($respuesta);
					}
					break;
				default:
					echo "No existe la ruta";
					http_response_code(404);
					break;
			}
		}
	} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

		$postBody = file_get_contents('php://input');
		$convert = json_decode($postBody);
		if (json_last_error() == 0) {
			switch ($var) {
				case 'productos':
					$rps = DeleteProducto(get_object_vars($convert));
					$respuesta =[
						"code" => http_response_code(200),
						"msj" => $rps
					];
					echo json_encode($respuesta);
					break;
				default:
					echo "No existe la ruta";
					http_response_code(404);
					break;
			}
		}
	} else {

		http_response_code(405);
	}
} else { ?>
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
					PUT: /productos
				</code>
				<code>
					GET: /productos
					<br>
					GET: /Productos/$id
				</code>
				<code>
					DELETE: /productos/$id
				</code>
			</div>
		</div>
	</body>
<?php } ?>