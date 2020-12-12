<?php
session_start();
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

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     

    <!-- Nuestro css-->
    <link href="css/form-validation.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/jazba_02_solo.png"/>

    <title>Registation</title>

    <style>
        .custom-control {
            position: sticky;
        }
    </style>

</head>
<body class="bg-light" id="degradado">

<div class="text-center container" id="nuevoestilo">

  <?php
  if(isset($_POST['registro'])) {

    require("conexion.php");

    $dni = $mysqli->real_escape_string($_POST['dni']);
    $password = null;
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $myfile = $_FILES['file'];
    $isEnabled = null;
    $idInstitucion = $mysqli->real_escape_string($_POST['id_institucion']);
    $idRole = $mysqli->real_escape_string($_POST['id_role']);
    $idEspecialidad = $mysqli->real_escape_string($_POST['id_especialidad']);
    $lastnamefather = $mysqli->real_escape_string($_POST['last_name_father']);
    $lastnamemother = $mysqli->real_escape_string($_POST['last_name_mother']);

    // Verificamos si el correo o el usuario ya se a registrado
    $consultausuario = "SELECT username FROM tbl_user WHERE username = '$username'";
    $consultaemail = "SELECT email FROM tbl_user WHERE email = '$email'";

    if($resultadousuario = $mysqli->query($consultausuario));
    $numerousuario = $resultadousuario->num_rows;

    if($resultadoemail = $mysqli->query($consultaemail));
    $numeroemail = $resultadoemail->num_rows;

    if($numeroemail>0) {
      echo "Este correo ya esta registrado, intenta con otro";
    }
    elseif($numerousuario>0) {
        echo "Este usuario ya existe";
      }

      //Verificamos si el usuario es de isil
    elseif($idInstitucion == 1 && $idRole ==3){

        $aleatorio = uniqid();

        $query = "INSERT INTO tbl_user (dni,password,username,email,phone,file,is_enabled,id_institucion,id_role,id_especialidad,last_name_father,last_name_mother,code) VALUES ('$dni','$password','$username','$email','$phone','$myfile','$isEnabled','$idInstitucion','$idRole','$idEspecialidad','$lastnamefather','$lastnamemother','$aleatorio')";
        $mysqli->query($query);

        require 'phpmailer/class.phpmailer.php';
        require 'phpmailer/class.smtp.php'; //incluimos la clase para envíos por SMTP
    
        $mail = new PHPMailer();
    
        $mail->From     = $email;
        $mail->FromName = $username; 
        $mail->AddAddress("jazbacop@gmail.com"); // Dirección a la que llegaran los mensajes.
       
    // Aquí van los datos que apareceran en el correo que reciba
                
        $mail->WordWrap = 50; 
        $mail->IsHTML(true);     
        $mail->Subject  =  "Nuevo registro de Usuario";
        $mail->Body     =  "Un nuevo usuario desea registrarse, sus datos para validar son: \n<br/>".
        "Dni: $dni \n<br />".
        "Nombre: $username \n<br />".
        "Apellidos: $lastnamefather \n<br />".
        "Apellidos: $lastnamemother \n<br />".
        "Email de usuario: $email \n<br />".
        "Telefono: $phone \n<br />".
        "Institución: $idInstitucion \n<br />".
        "Especialidad: $idEspecialidad \n<br />".
        "Rol de usuario: $idRole \n<br />".
        "Password: $password \n<br />";
        $mail->Body .= "http://localhost:8080/Jazba-2.0/jazba-web/generarcontrasena.php?user=".$username."&code=".$aleatorio."\n\n";
        $mail->AddAttachment($myfile['tmp_name'], $myfile['name']);   
        
        
    
    // Datos del servidor SMTP l
    
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = 'smtp.gmail.com'; //servidor smtp, esto lo puedes dejar igual
        $mail->Port = 465; //puerto smtp de gmail, tambien lo puedes dejar igual
        $mail->Username = 'jazbacop@gmail.com';  // Tu correo gmail
        $mail->Password = 'C40scarpe10'; // Tu contrasena gmail
        $mail->FromName = 'Jazba FaceJob'; // 
        $mail->From = 'jazbacop@gmail.com' ; //email de remitente desde donde se envía el correo, este caso para evitar spam es el mismo que tu correo gmail
        
        if ($mail->Send()){

            //correo que será enviado al alumno
    $email_to = $email;
    $email_subject = "Solicitud de cuenta en Jazba";
    $email_from = "jazbacop@gmail.com";

    $email_message = "Hola " . $row['username'] . ", haz llenado el registro para crearte una cuenta en Jazba, con ello haz dado el primer paso para ser parte de esta red laboral.\n\n";
    $email_message .= "Verificaremos tu identidad estudiantil y generaremos tu credenciales, las cuales te las enviaremos a tu correo.\n\n";
    // Ahora se envia el e-mail usando la funcion mail() de PHP
    $headers = 'From: ' .$email_from. "\r\n".
    'Reply-To: ' .$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

        echo "Formulario enviado exitosamente, le responderemos lo más pronto posible.";
        header("Refresh: 5; URL=login.php");
        }
        else{
        echo "Error al enviar el formulario ";
        header("Refresh: 5; URL=registro.php");
        }
    }
    else{
        $aleatorio = uniqid();

        $query = "INSERT INTO tbl_user (dni,password,username,email,phone,file,is_enabled,id_institucion,id_role,id_especialidad,last_name_father,last_name_mother,code) VALUES ('$dni','$password','$username','$email','$phone','$myfile','$isEnabled','$idInstitucion','$idRole','$idEspecialidad','$lastnamefather','$lastnamemother','$aleatorio')";
        $mysqli->query($query);

        $email_to = $email;
    $email_subject = "Solicitud de cuenta en Jazba";
    $email_from = "jazbacop@gmail.com";

    $email_message = "Hola " . $username. ", haz llenado el registro para crearte una cuenta en Jazba, con ello haz dado el primer paso para ser parte de esta red laboral.\n\n";
    $email_message .= "Accede al siguiente enlace en el que podras crear tus credenciales.\n\n";
    $email_message .= "http://localhost:8080/Jazba-2.0/jazba-web/generarcontrasena.php?user=".$username."&code=".$aleatorio."\n\n";
    // Ahora se envia el e-mail usando la funcion mail() de PHP
    $headers = 'From: ' .$email_from. "\r\n".
    'Reply-To: ' .$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $enviado = @mail($email_to, $email_subject, $email_message, $headers);
    if ($enviado){

        echo "Formulario enviado exitosamente, le responderemos lo más pronto posible.";
        header("Refresh: 5; URL=login.php");
        }
        else{
        echo "Error al enviar el formulario ";
        header("Refresh: 5; URL=registro.php");
        }
    }
      

    $mysqli->close();

  }
  ?>
  
  <img class="d-block mx-auto mb-4" src="img/jazba_02.png" alt="" width="100" height="110">

    <h1>PÁGINA DE REGISTRO</h1>
    <p class="lead"><em> Es la confianza mutua, más que el interés mutuo, la que mantiene unidos los grupos humanos (H. L. Mencken)</em></p>
    </br>
    <div  align="left">
        <h4 class="mb-3"><strong>DATOS PERSONALES</strong></h4>
        <form  action="" method="post" enctype="multipart/form-data">

            <div class="row">
				<div class="col-md-6 mb-3">
					<div class="form-group">
						<label>DNI</label>
						<input class="form-control" type="text" name="dni" maxlength="8" placeholder="Mi DNI es..." pattern="[0-9]{8}" title="Debe poner 8 números" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required >
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label>NOMBRES</label>
                        <input class="form-control" type="text" name="username" placeholder="Mi nombre es..." pattern="[A-Za-z]{3,255}" required >
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label>APELLIDO PATERNO</label>
                        <input class="form-control" type="text" name="last_name_father" placeholder="Mi apellido paterno es..." required >
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label>APELLIDO MATERNO</label>
                        <input class="form-control" type="text" name="last_name_mother" placeholder="Mi apellido materno es..." required >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label>CORREO(Debe ser el de tu universidad)</label>
                        <input class="form-control" type="text" name="email" placeholder="nombre@example.com" required >
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label>TELEFONO</label>
                        <input class="form-control" type="number" name="phone" placeholder="Mi teléfono es..." required >
                    </div>
                </div>
            </div>
			<div>
                <select name="id_especialidad" id="id_especialidad" class="custom-select" required>
					<option selected>SELECCIONAR -- ESPECIALIDAD </option>
                    <option value="1">Ingeniería de Sistemas</option>
                    <option value="2">Ingeniería de Software</option>
                    <option value="3">Diseñador tecnológico</option>
                </select>
            </div>
            <br>
            <div>
                <select name="id_role" id="id_role" class="custom-select" required>
					<option selected>SELECCIONAR -- TIPO DE USUARIO </option>
                    <option value="2">Profesor</option>
					<option value="3">Alumno</option>
                </select>
                </div>
                <br>
            <div>
                <select name="id_institucion" id="id_institucion" class="custom-select" required>
					<option selected>SELECCIONAR -- CASA ESTUDIANTIL SUPERIOR </option>
                    <option value="1">ISIL</option>
                    <option value="2">USMP</option>
                    <option value="3">USIL</option>
                    <option value="4">CIBERTEC</option>
                    <option value="5">UTP</option>
                    <option value="6">PUCP</option>
                </select>
            </div>
			<br>
            <div class="row">
                <!-- <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label>CONTRASEÑA</label>
                        <input class="form-control" type="password" name="password" placeholder="Ingresa contraseña" required >
                    </div>
                </div> -->
                <div class="col-md-8 mb-3">
                    <div class="form-group">
                        <label>Adjunta comprobante estudiantil(Requerido si eres estudiante de ISIL)</label>
                        <input style="border:none;"class="form-control" type="file" name="file">
                    </div>
                </div>
            </div>
            <div style="float:right;" class="g-recaptcha" data-sitekey="6LcM_vAZAAAAALqUeCa9Y9A0aPl6d3QxvYr_2VVu"></div> 
            <div class="custom-control custom-checkbox">
                <input style="opacity:1;" type="checkbox" class="custom-control-input btn-open-popup" id="save-info" required>
                <p style="color:black;">ACEPTO EL USO DE LA INFORMACIÓN PARA FINES PUBLICITARIOS</p>

            </div>

            <div class="custom-control custom-checkbox">

                <input style="opacity:1;" type="checkbox" class="custom-control-input" data-required="1" name="terminos" required>
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

                        <a href="#" class="btn-close-popup">x</a>
                    </div>
                </div>
            </div>
            
            </br>
            <button class="btn btn-primary btn-lg btn-block" name="registro" type="submit" >Enviar solicitud</button>

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
 <!-- javascript para confirmar datos del formulario.
    ================================================== -->
    <!-- La página carga más rapido si estan situados al final del documento. -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
