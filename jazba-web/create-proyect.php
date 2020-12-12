<?php
include('config.php');
session_start();

$file= $_POST["file"];
$title= $_POST["title"];
$desc= $_POST["desc"];
$dni = $_POST["dni"];

$sql = "INSERT INTO tbl_repoproyectos (DNI,filename,upload_repo,Descripcion) 
VALUES($dni,'$title','$file','$desc')";

$rs=mysqli_query($db,$sql);

mysqli_close($db);

?>