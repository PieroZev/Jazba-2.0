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
<<<<<<< HEAD
      $myfile = null;  
      $isEnabled = true;
      $idInstitucion =1; 
      $idRole = 1; 
      $idEspecialidad = 1; 
      $lastnameFather = mysqli_real_escape_string($db,$_POST['lastname-father']); 
      $lastnameMother = mysqli_real_escape_string($db,$_POST['lastname-mother']); 
      
      $sql = "INSERT into tbl_user values('$mydni','$mypassword','$myusername','$myemail','$myphone','$myfile','$isEnabled','$idInstitucion','$idRole','$idEspecialidad','$lastnameFather','$lastnameMother');";
=======
      //$myphoto = mysqli_real_escape_string($db,$_POST['photo']);;  
      $isEnabled = 1;
      $idInstitucion = mysqli_real_escape_string($db,$_POST['id_institucion']);
      $idRole = mysqli_real_escape_string($db,$_POST['id_role']);
      $idEspecialidad = mysqli_real_escape_string($db,$_POST['id_especialidad']);
      $lastnameFather = mysqli_real_escape_string($db,$_POST['lastname-father']); 
      $lastnameMother = mysqli_real_escape_string($db,$_POST['lastname-mother']);
	  if(isset($_REQUEST['enviar'])){
				if(isset($_FILES['photo']['name'])){
					$tipoArchivo=$_FILES['photo']['type'];
					$nombreArchivo=$_FILES['photo']['name'];
					$tamanoArchivo=$_FILES['photo']['size'];
					$imagenSubida=fopen($_FILES['photo']['tmp_name'], 'r');
					$binariosImagen = fread($imagenSubida, $tamanoArchivo);
					$binariosImagen = mysqli_escape_string($db,$binariosImagen);
				}
			}
      
      $sql = "INSERT into tbl_user(DNI,password,username,email,phone,photo,is_enabled,id_institucion,id_role,id_especialidad,last_name_father,last_name_mother) values('$mydni','$mypassword','$myusername','$myemail','$myphone','$binariosImagen','$isEnabled','$idInstitucion','$idRole','$idEspecialidad','$lastnameFather','$lastnameMother');";
>>>>>>> 8c54ac8c31a64fca98e8b4bb5e261856e415463d
      
      // Si el resultado coincide con $ myusername y $ mypassword, la fila de la tabla debe ser 1 fila
        
      if(mysqli_query($db,$sql)) {
         //session_register($myusername);
         $_SESSION['login_user'] = $myusername;
         
         header("location: login.php");
      }else {
         printf("No se pudo crear el usuario");
      }
   }
?>
<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

     

    <!-- Nuestro css-->
    <link th:href="@{/css/form-validation.css}" rel="stylesheet">

    <link rel="shortcut icon" th:href="@{/img/jazba_02_solo.png}"/>

    <title>Registation</title>

    <style>
        .custom-control {
            position: sticky;
        }
    </style>

</head>
<body class="bg-light" id="degradado">

<div class="text-center container" id="nuevoestilo">
    <img class="d-block mx-auto mb-4" src="img/jazba_02.png" alt="" width="100" height="110">

    <h1>PÁGINA DE REGISTRO</h1>
    <p class="lead"><em> Es la confianza mutua, más que el interés mutuo, la que mantiene unidos los grupos humanos (H. L. Mencken)</em></p>
    </br>
    <div  align="left">
        <h4 class="mb-3"><strong>DATOS PERSONALES</strong></h4>
        <form  th:action="@{/registration}" method="post" enctype="multipart/form-data">
		<?php
			// if(isset($_REQUEST['enviar'])){
				// if(isset($_FILES['photo']['name'])){
					// $tipoArchivo=$_FILES['photo']['type'];
					// $nombreArchivo=$_FILES['photo']['name'];
					// $tamanoArchivo=$_FILES['photo']['size'];
					// $imagenSubida=fopen($_FILES['photo']['tmp_name'], 'r');
					// $binariosImagen = fread($imagenSubida, $tamanoArchivo);
					// $binariosImagen = mysqli_real_escape_string($db,$_POST['photo']);;
				// }
			// }
		?>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label>DNI</label>
                    <input class="form-control" type="text" name="dni" maxlength="8" placeholder="DNI" pattern="[0-9]{8}" title="Debe poner 8 números" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label>NOMBRES</label>
                        <input class="form-control" type="text" name="username" placeholder="" pattern="[A-Za-z]{3,255}" required >
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label>APELLIDO PATERNO</label>
                        <input class="form-control" type="text" name="lastname-father" placeholder="" required >
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label>APELLIDO MATERNO</label>
                        <input class="form-control" type="text" name="lastname-mother" placeholder="" required >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label>CORREO</label>
                        <input class="form-control" type="text" name="email" placeholder="nombre@example.com" required >
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label>TELEFONO</label>
                        <input class="form-control" type="number" name="phone" placeholder="" required >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label>CONTRASEÑA</label>
                        <input class="form-control" type="password" name="password" placeholder="password" required >
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label>CONFIRMA CONTRASEÑA</label>
                        <input class="form-control" type="password" name="passwordConfirm" placeholder="passwordConfirm" required >
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-md-6 mb-3">
					<div class="form-group">
						<label>FOTO</label>
						<input type="file" class="form-control-file" name="photo" required >
					</div>
				</div>
			</div>

            <div class="custom-control custom-checkbox">
                <input style="opacity:1;" type="checkbox" class="custom-control-input btn-open-popup" id="save-info">
                <p style="color:black;">ACEPTO EL USO DE LA INFORMACIÓN PARA FINES PUBLICITARIOS</p>

            </div>

            <div class="custom-control custom-checkbox">

                <input style="opacity:1;" type="checkbox" class="custom-control-input" data-required="1" name="terminos">
                <p style="color:black;">ACEPTAR LOS <a style="color:blue;" class="btn-open-popup" href="#modal">TÉRMINOS Y CONDICIONES</a></p>

                <div class="container-all" id="modal">
                    <div class="popup">
                        <div class="img"></div>
                        <div class="container-text">
                            <h1>Términos y condiciones Jazba</h1>
                            <h3>INFORMACIÓN RELEVANTE</h3>
                            <p>Es requisito necesario para la registración en esta web, que lea y acepte los siguientes Términos y Condiciones que a continuación se redactan. El uso de nuestros servicios así como la interacción con la web necesitara que usted ha leído y aceptado los Términos y Condiciones de Uso en el presente documento. Ante cualquier cituación de posible robo de información nuestro sistema activara un servicio de seguridad el cual permitira que usted y su información personal no se vean afectados.
                                En estos posibles casos se le pedira que cambie de contraseña. El usuario puede elegir y cambiar la clave para su acceso de administración de la cuenta en cualquier momento, en caso de que se haya registrado y que sea necesario para la compra de alguno de nuestros productos.  no asume la responsabilidad en caso de que entregue dicha clave a terceros.
                                Todas las compras y transacciones que se lleven a cabo por medio de este sitio web, están sujetas a un proceso de confirmación y verificación, el cual podría incluir la verificación del stock y disponibilidad de producto, validación de la forma de pago, validación de la factura (en caso de existir) y el cumplimiento de las condiciones requeridas por el medio de pago seleccionado. En algunos casos puede que se requiera una verificación por medio de correo electrónico.
                                Los precios de los productos ofrecidos en esta Tienda Online es válido solamente en las compras realizadas en este sitio web.</p>
                            <h3>LICENCIA</h3>
                            <p>Jazba  a través de su sitio web concede una licencia para que los usuarios utilicen  los productos que son vendidos en este sitio web de acuerdo a los Términos y Condiciones que se describen en este documento.</p>
                            <h3>USO NO AUTORIZADO</h3>
                            <p>En caso de que aplique (para venta de software, templetes, u otro producto de diseño y programación) usted no puede colocar uno de nuestros productos, modificado o sin modificar, en un CD, sitio web o ningún otro medio y ofrecerlos para la redistribución o la reventa de ningún tipo.</p>
                            <h3>PROPIEDAD</h3>
                            <p>Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros productos, modificado o sin modificar. Todos los productos son propiedad  de los proveedores del contenido. En caso de que no se especifique lo contrario, nuestros productos se proporcionan  sin ningún tipo de garantía, expresa o implícita. En ningún esta compañía será  responsables de ningún daño incluyendo, pero no limitado a, daños directos, indirectos, especiales, fortuitos o consecuentes u otras pérdidas resultantes del uso o de la imposibilidad de utilizar nuestros productos.</p>
                        </div>

                        <!--<a href="#" class="btn-close-popup">x</a>-->
                    </div>
                </div>
            </div>
            </br>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="enviar" >Enviar solicitud</button>

        </form>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy;COPYRIGHT  DERECHOS RESERVADOS</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
</body>
</html>