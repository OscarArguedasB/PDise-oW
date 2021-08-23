<?php
$correo = $_GET['correo'];
include 'connection.php'; 
$elSQL = "select email, password, tipo, nombre, apellidos, empresa from tutoria where email = $email";
$myArray = getObjeto($elSQL); 
echo json_encode($myArray, JSON_UNESCAPED_UNICODE); 
?>