<?php
function recoge($var, $m = "")
{
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

$server = "localhost";
$user = "root";
$pass = "";
$bd = "proyecto";
$email = recoge("email");
$password  = sha1(recoge('password'));
$_SESSION['usuario'] = $email;
$conexion = mysqli_connect($server, $user, $pass, $bd);
if ($conexion) {
} else {
  return $conexion;
}

$consulta = "SELECT * FROM usuario where email = '$email' and password = '$password'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if ($filas) {
  header("location: usuario.php?email=$email");
  session_start();
} else {
  include("index.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);
