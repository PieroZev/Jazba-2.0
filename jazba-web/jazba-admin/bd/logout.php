<?php
session_start();
unset($_SESSION["s_usuario"]);
unset($_SESSION["s_idRol"]);
unset($_SESSION["s_role_name"]);
session_destroy();
header("Location:../index.php");
?>