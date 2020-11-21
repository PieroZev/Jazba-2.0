<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS

$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$is_enabled = (isset($_POST['is_enabled'])) ? $_POST['is_enabled'] : '';
$id_institucion = (isset($_POST['id_institucion'])) ? $_POST['id_institucion'] : '';
$id_role = (isset($_POST['id_role'])) ? $_POST['id_role'] : '';
$id_especialidad = (isset($_POST['id_especialidad'])) ? $_POST['id_especialidad'] : '';
$last_name_father = (isset($_POST['last_name_father'])) ? $_POST['last_name_father'] : '';
$last_name_mother = (isset($_POST['last_name_mother'])) ? $_POST['last_name_mother'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$DNI = (isset($_POST['DNI'])) ? $_POST['DNI'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO tbl_user (DNI, username, password, email, phone, is_enabled, id_institucion, id_role, id_especialidad, last_name_father, last_name_mother) VALUES('$DNI', '$username', '$password', '$email', '$phone', '$is_enabled', '$id_institucion', '$id_role', '$id_especialidad', '$last_name_father', '$last_name_mother') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT * FROM tbl_user ORDER BY DNI DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE tbl_user SET username='$username', password='$password', email='$email', phone='$phone', is_enabled='$is_enabled', id_institucion='$id_institucion', id_role='$id_role', id_especialidad='$id_especialidad', last_name_father='$last_name_father', last_name_mother='$last_name_mother' WHERE DNI='$DNI' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM tbl_user WHERE DNI='$DNI' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "UPDATE tbl_user SET is_enabled=0 WHERE DNI='$DNI' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
	case 4:
		$consulta = "SELECT DNI, password, username, email, phone, is_enabled, id_institucion, id_role, id_especialidad, last_name_father, last_name_mother FROM tbl_user where is_enabled = 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
