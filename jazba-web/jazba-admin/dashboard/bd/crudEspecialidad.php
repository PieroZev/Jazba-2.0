<?php
session_start();
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS

$Descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_especialidad = (isset($_POST['id_especialidad'])) ? $_POST['id_especialidad'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO tbl_especialidad (Descripcion) VALUES('$Descripcion') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT * FROM tbl_especialidad ORDER BY id_especialidad DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE tbl_especialidad SET Descripcion='$Descripcion' WHERE id_especialidad='$id_especialidad' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM tbl_especialidad WHERE id_especialidad='$id_especialidad' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM tbl_especialidad WHERE id_especialidad='$id_especialidad' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
	case 4:
		$consulta = "SELECT id_especialidad, Descripcion FROM tbl_especialidad";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
