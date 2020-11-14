<?php
session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//recepción de datos enviados mediante POST desde ajax
$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

//$pass = md5($password); //encripto la clave enviada por el username para compararla con la clava encriptada y almacenada en la BD

$consulta = "SELECT tbl_admin.id_role AS idRol, tbl_role.name AS rol FROM tbl_admin JOIN tbl_role ON tbl_admin.id_role = tbl_role.id_role WHERE username='$username' AND password='$password'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_username"] = $username;
	$_SESSION["s_idRol"] = $data[0]["idRol"];
	$_SESSION["s_role_name"] = $data[0]["rol"];
}else{
    $_SESSION["s_username"] = null;
    $data=null;
}

print json_encode($data);
$conexion=null;