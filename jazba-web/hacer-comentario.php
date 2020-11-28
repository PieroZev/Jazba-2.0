<?php
include('config.php');
session_start();

$com= $_POST["com"];
$postId= $_POST["postId"];

$sql = "INSERT INTO tbl_repoproyectosdetalles (id_repositorio,comentario,fechahora_comentario,num_likes)
VALUES($postId,'$com',now(),0)";

$rs=mysqli_query($db,$sql);

mysqli_close($db);

?>