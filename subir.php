<?php
$nombre_temporal = $_FILES['archivo']['tmp_name'];
$nombre = $_FILES['archivo']['name'];
move_uploaded_file($nombre_temporal, 'archivos/' . $nombre);

$nombre_temporal = $_FILES['imagen']['tmp_name'];
$nombre1 = $_FILES['imagen']['name'];
move_uploaded_file($nombre_temporal, 'proyecto/' . $nombre1);
function recoge($var, $m = "")
{
	//isset devolverá FALSE cuando verifique una variable que se haya asignado a NULL
	if (!isset($_POST[$var])) {
		$tmp = (is_array($m)) ? [] : "";
	} elseif (!is_array($_POST[$var])) {
		$tmp = trim(htmlspecialchars($_POST[$var], ENT_QUOTES, "UTF-8"));
	} else {
		$tmp = $_POST[$var];
		array_walk_recursive($tmp, function (&$valor) {
			$valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
		});
	}
	return $tmp;
}

$archivo = recoge('nombre');
$descripcion = recoge('descripcion');
$email = recoge('email');

include 'conexion.php';
$objetoConnect = new Connect();
$responseRegister = "Enviado satisfactoriamente";
echo json_decode($objetoConnect->proyectos($archivo, $descripcion, $email, $nombre1, $nombre));
?>