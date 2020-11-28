<?php
include('config.php');
session_start();

$likes= $_POST["numLikes"];
$postId= $_POST["postId"];
$detailId= $_POST["detailId"];

$sql = "UPDATE tbl_repoproyectosdetalles RPD set num_likes = ($likes+1) 
where RPD.id_repositorio = $postId and RPD.id_detalles = $detailId";

$rs=mysqli_query($db,$sql);

mysqli_close($db);

?>