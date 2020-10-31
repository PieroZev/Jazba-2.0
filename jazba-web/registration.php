<!DOCTYPE html>
<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $mydni = mysqli_real_escape_string($db,$_POST['dni']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $myphone = mysqli_real_escape_string($db,$_POST['phone']);
      $myfile = null;  
      $isEnabled = true;
      $idInstitucion = mysqli_real_escape_string($db,$_POST['id-institucion']); 
      $idRole = mysqli_real_escape_string($db,$_POST['id-role']); 
      $idEspecialidad = mysqli_real_escape_string($db,$_POST['id-especialidad']); 
      $lastnameFather = mysqli_real_escape_string($db,$_POST['lastname-father']); 
      $lastnameMother = mysqli_real_escape_string($db,$_POST['lastname-mother']); 
      
      $sql = "INSERT into tbl_user values('$mydni','$mypassword','$myusername','$myemail','$myphone','$myfile','$isEnabled','$idInstitucion','$idRole','$idEspecialidad','$lastnameFather','$lastnameMother');";
      
      // Si el resultado coincide con $ myusername y $ mypassword, la fila de la tabla debe ser 1 fila
        
      if(mysqli_query($db,$sql)) {
         //session_register($myusername);
         $_SESSION['login_user'] = $myusername;
         
         header("location: perfil-usuario.html");
      }else {
         printf("No se pudo crear el usuario");
      }
   }
?>

<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Registation</title>
</head>
<body class="text-center">

    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-md-12">Registration</div>
                <form action="registration.php" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="Correo" id="txtCorreo" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="password" id="txtPassword" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="passwordConfirm" placeholder="passwordConfirm" >
                    </div>

                    <div class="form-row">
                        
                        <input class="form-control" type="text" name="dni" placeholder="DNI" id="txtDni" >
                        <input class="form-control" type="text" name="username" placeholder="Usuario" id="txtUsername" >
                        <input class="form-control" type="text" name="lastname-father" placeholder="Apellido Paterno" id="txtFather" >
                        <input class="form-control" type="text" name="lastname-mother" placeholder="Apellido Materno" id="txtMother" >
                        
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone" placeholder="Telefono" id="txtPhone" >
                    </div>
                    
                    <div class="form-row">
                       
                        <input class="form-control" type="number" name="id-institucion" placeholder="Institucion" id="txtInstitucion" >
                        <input class="form-control" type="number" name="id-role" placeholder="Rol" id="txtRole" >
                        <input class="form-control" type="number" name="id-especialidad" placeholder="Especialidad" id="txtEspecialidad" >
                        
                    </div>

                    <button class="btn btn-primary" type="submit" >Create</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>