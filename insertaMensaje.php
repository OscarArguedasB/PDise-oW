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

$email=recoge("to");
$de=recoge("name");
$emailDe=recoge("from");
$msj=recoge("message");

include 'conexion.php';
$objetoConnect = new Connect();
$responseRegister = "Enviado satisfactoriamente";
echo json_decode($objetoConnect->mensaje($email, $de, $emailDe, $msj));