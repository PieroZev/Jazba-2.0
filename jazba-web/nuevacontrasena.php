<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link href="css/form-validation.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/jazba_02_solo.png" />

  <title>Nueva contraseña</title>

</head>

<body style="background: #0780fe;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">   
        <img src="img/logojazba-03-horizontal.png" width="140px" height="60px"/>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Explora <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Proyectos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Jazba</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <li class="nav-item" style="list-style:none;">
                <a class="nav-link disabled" href="#">Empieza ya!</a>
              </li>
            <a class="btn btn-outline my-2 my-sm-0" href="login.php">Iniciar sesión</a>
          </form>
        </div>
      </nav>

  <?php
  if(isset($_GET['user']) AND isset($_GET['token'])) {

    require "conexion.php";

    $user = $mysqli->real_escape_string($_GET['user']);
    $token = $mysqli->real_escape_string($_GET['token']);

    $sql = $mysqli->query("SELECT token FROM tbl_user WHERE username = '$user'");
    $row = $sql->fetch_array();

    if($row['token'] ==  $token) {
  ?>

<div class="container comp-central">  

  <?php
  if(isset($_POST['codigo'])) {
    require "conexion.php";

    $contrasena = $mysqli->real_escape_string($_POST['contrasena']);

    $act = $mysqli->query("UPDATE tbl_user SET password = '$contrasena', token = '' WHERE username = '$user'");

    if($act) {
      echo "Su contraseña se ha cambiado, ya puede ingresar";
      Header("Refresh: 0; URL=login.php");
      }
  }
  ?>


<div class="main-content">
    <h1 class="wds-type--page-title">Es el momento, cambia tu contraseña</h1>
    <h5>Jazba te da la maxima seguridad permitiendo cambiar tu contraseña, pero que esto no se te haga un hábito. Es el momento
        de que inicies tu vida laboral por ello, ¡sigue! No despegues de algo tan importante como lo es Jazba.</h5>
    <form action="" method="post">
        <div class="l-part">
          <div  class="form-group" id="password-group">
            <input style="padding-left: 54px;" type="text" placeholder="Ingresa tu nueva contraseña" class="input camp input-icono" name="contrasena" required />
        </div>
        <input type="submit" value="Cambiar contraseña" class="btn wds-button" name="codigo" />
        </div>
    </div>
</div>

<div class="debag text-center">
    <p style="margin-bottom: 0px;">Sigue disfrutando de todo lo que puede darte nuestra red social y encuentra tu primer empleo.</p>
    <p>Copyright © 1999-2020 Jazba</p>
    <img src="img/diploma-blanco.png" width="90px" height="60px"/>
</div>

</body>
<?php } } ?>
</html>
