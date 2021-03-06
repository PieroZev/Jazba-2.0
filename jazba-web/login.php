<!DOCTYPE html>
<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT username FROM tbl_user WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['username'];
      
      $count = mysqli_num_rows($result);
      
      // Si el resultado coincide con $ myusername y $ mypassword, la fila de la tabla debe ser 1 fila
        
      if($count == 1) {
         //session_register($myusername);
         $_SESSION['login_user'] = $active;
         
         header("location: profile.php");
      }else {
         $error = "Tu usuario y contraseña son incorrectos";
      }
   }
?>

<html lang="en" xmlns:th="http://www.thymeleaf.org" xmlns:layout="http://www.ultraq.net.nz/thymeleaf/layout"
      layout:decorate="master">
<head th:fragment="html_head">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <title>Login</title>

    <style>

        body {
            height: auto;
        }
        #degradado {
            background: -webkit-linear-gradient(#0d385f, #0780fe);
            padding-top: 0;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .h2{
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: white;
        }
    </style>

    <!-- Nuestro css-->
    <link href="css/floating-labels.css" rel="stylesheet">


</head>

<div>


    <div align="left" >
        <img src="img/logojazba-03-blanco.png" height="80px" width="180px" >
        <h1 class="h2" align="center"> EL TALENTO ES TUYO,</h1>
        <h1 class="h2" align="center">NOSOTROS SÓLO TE ENSEÑAMOS EL CAMINO</h1>
        <br>



        <body id="degradado">

        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-2"><a href="index.php" class="btn btn-primary" style="float:right;">Ir al Menu</a></div>
        <div class="col-md-2"><a href="posts.php" class="btn btn-primary">Ir a Posts</a></div>
        <div class="col-md-4"></div>
        </div>

        <div class="nuevoestilo">
            <div class="form-signin">

                <div class="text-center mb-4"  >
                    <img class="mb-4" src="img/jazba_02_solo.png" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">INICIA SESIÓN CON JAZBA</h1>
                    <p>Y ALCANZA TUS SUEÑOS PROFESIONALES  </p>
                </div>
                <form  onSubmit="" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="Email" id="txtCorreo" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" id="txtPassword">
                    </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Recordar
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">INICIAR SESIÓN</button>
                <div align="center">
                    <p>  <a href="olvidecontraseña.php"> ¿Olvidaste la contraseña?</a></p>
                    ¿Aún no eres parte de la comunidad JAZBA? <a href="registration.php"> ¡Registrate aquí!</a>
                </div>
                </form>
            </div>
        </div>

<script src="js/jquery-3.3.1.min.js"></script>

        </body>
    </div>
</div>
</html>
