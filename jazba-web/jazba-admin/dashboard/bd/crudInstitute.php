<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS

$Nombre = (isset($_POST['Nombre'])) ? $_POST['Nombre'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_institucion = (isset($_POST['id_institucion'])) ? $_POST['id_institucion'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO tbl_institucion (Nombre) VALUES('$Nombre') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT * FROM tbl_institucion ORDER BY id_institucion DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE tbl_institucion SET Nombre='$Nombre' WHERE id_institucion='$id_institucion' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM tbl_institucion WHERE id_institucion='$id_institucion' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM tbl_institucion WHERE id_institucion='$id_institucion' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
	case 4:
		$consulta = "SELECT * FROM tbl_institucion";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
