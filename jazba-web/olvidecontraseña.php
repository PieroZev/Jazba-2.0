<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
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

    <title>Olvide contraseña</title>

    <style>
        .custom-control {
            position: sticky;
        }
        .comp-central{
            background: white;
            margin-top: 100px;
            padding: 50px 20px;
            border-radius: 6px;
        }
        .camp{
            margin-top: 20px;
            width: 920px;
            border: 1px solid #D0D2D3;
            font-size: 30px;
            color: #333E48;
            border-radius: 4px;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            box-shadow: none;
            background-color: #fff;
            padding: 8px 12px;
            line-height: 1.4;
        }
        .wds-button{
            margin-top: 15px;
            background: #EF5351;
            border-radius: 4px;
            position: relative;
            font-weight: 500;
            font-family: National2,"Helvetica Neue",Helvetica,Arial,sans-serif;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: color 0.4s, border-color 0.4s, background-color 0.4s;
            color: #fff;
        }
        .btn-outline{
        color: #0780fe;
        border-color: #0780fe;
        }
        .wds-type--page-title {
        font-size: 34px;
        font-weight: 300;
        line-height: 1.35;
        }
        h5{
            font-weight: 300;  
            line-height: 1.35;
        }
        .debag{
            margin-top: 100px;
        }
        .form-group input{
            height: 42px;
            font-size: 18px;
            border:0;
            padding-left: 54px;
            border-radius: 5px;
            border: 1px solid #D0D2D3
        }

        .form-group::before{
            font-family: "Font Awesome\ 5 Free";
            position: absolute;
            left: 58px;
            font-size: 18px;
            padding-top: 9px;
            margin-left: 18%;

        }

        .form-group#user-group::before{
            content: "\f0e0";
        }
    </style>

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
      <div class="container comp-central">    

<?php
if(isset($_POST['codigo'])){
    require "conexion.php";

    $email = $mysqli->real_escape_string($_POST['email']);

    $sql = $mysqli->query("SELECT username, email FROM tbl_user WHERE email = '$email'");
    $row = $sql->fetch_array();
    $count = $sql->num_rows;

    if($count == 1) {

        $token = uniqid();
        
        $act = $mysqli->query("UPDATE tbl_user SET token = '$token' WHERE email = '$email'");

        //Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
    $email_to = $email;
    $email_subject = "Cambio de contraseña";
    $email_from = "jazbacop@gmail.com";

    $email_message = "Hola " . $row['username'] . ", haz solicitado cambiar tu contraseña, para ello ingresa al siguiente link. Si no fuiste tu omite este mensaje\n\n";
    $email_message .= "http://localhost:8080/Jazba-2.0/jazba-web/nuevacontrasena.php?user=".$row['username']."&token=".$token."\n\n";

    // Ahora se envia el e-mail usando la funcion mail() de PHP
    $headers = 'From: ' .$email_from. "\r\n".
    'Reply-To: ' .$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    echo "Te hemos enviado un email para cambiar tu contraseña";

    } else {
        echo "Este correo electronico no esta registrado en la base de datos";
    }
}
?>
    <div class="main-content">
    <h1 class="wds-type--page-title">¿Olvidaste tu contraseña?</h1>
    <h5>Jazba te hace sencillo recuperar tu contraseña para que puedas seguir disfrutando de nuestra página, tan solo debes ingresar
    tu correo al que enviaremos una link para que puedas cambiar tu contraseña.</h5>
        <form action="" method="post">
            <div class="l-part">
                <div  class="form-group" id="user-group">
                    <input type="email" placeholder="Email" class="input camp input-icono" name="email" autocomplete="off" required>
                </div>
                <input type="submit" value="Recuperar mi contraseña" class="btn wds-button" name="codigo" />
            </div>
        </form>
    </div>
</div>
<div class="debag text-center">
    <p style="margin-bottom: 0px;">Sigue disfrutando de todo lo que puede darte nuestra red social y encuentra tu primer empleo.</p>
    <p>Copyright © 1999-2020 Jazba</p>
    <img src="img/diploma-blanco.png" width="90px" height="60px"/>
</div>

</body>
</html>