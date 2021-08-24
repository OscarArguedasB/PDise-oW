<?php
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

$nombre = recoge("nombre");
$apellidos = recoge("apellidos");
$email = recoge("email");
$emailN = recoge("emailN");
$passwordO=sha1(recoge("passwordO"));
$passwordN =sha1(recoge("passwordN"));
$empresa = recoge("empresa");
$acercaDe = recoge("acercaDe");

include 'conexion.php';
$objetoConnect = new Connect();
$responseUpdate = "Usuario Actualizado";
echo json_decode($objetoConnect->UpdUser($nombre, $apellidos,$email, $emailN, $passwordO, $passwordN, $empresa, $acercaDe));
?>