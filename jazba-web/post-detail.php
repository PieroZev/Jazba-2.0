<?php

include('config.php');

$usuario = null;
session_start();

$_SESSION["login_user"] = null;

    if ($_SESSION["login_user"]==null){
        $usuario = "visitante";
    }else{
        $usuario = $_SESSION["login_user"];
    }

$postId 			= $_GET["postId"];
$posttitle 			= "";
$postdescription 	= "";
$postimage			= "";
$postowner 			= "";
$postDetailIds 		= [];
$comments			= [];
$dateTimes 			= [];
$likes				= [];

if( $usuario != null) {
    // ejecuta la consulta al usuario
 
    $sql = "SELECT * from tbl_repoproyectos RP 
    inner join tbl_user US on US.DNI = RP.DNI where RP.id_repositorio = '$postId';";
	
	$sql .= "SELECT * from tbl_repoproyectosdetalles RPD where RPD.id_repositorio = '$postId' ORDER BY num_likes desc;";
 		 
	$nextResult = false;
	$nroQuery = 1;
		   
		if ($db -> multi_query($sql)) {
			do {
					 // Store first result set
					 
					   $result = mysqli_store_result($db);
					   while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
						 
						 if($nroQuery==1){
							$posttitle = $row['filename'];
							$postdescription = $row['Descripcion'];
							$postimage= $row['upload_repo'];
							$postowner= $row['username'].' '.$row['last_name_father'].' '.$row['last_name_mother'];
						 }
						 
						 if($nroQuery>1){
		   
						   $i = 0;
		   
						   foreach($result as $row){
			   
							   $postDetailIds[$i] = $row['id_detalles'];
							   $comments[$i] = $row['comentario'];
							   $dateTimes[$i] = $row['fechahora_comentario'];
							   $likes[$i]= $row['num_likes'];
							   
							   $i++;
						   }
					   }
		   
					 }
					 
					 $result -> free_result();
		   
					 // if there are more result-sets, the print a divider
					 if ($db -> more_results()) {
						 $db -> next_result();
						 $nextResult = true;
					 }
					 else{
					   $nextResult = false;
					 }
		   
					 $nroQuery++;
		   
					  //Prepare next result set
				   } while ($nextResult);
				 }
 
        }

		$db -> close();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ideas Creativas</title>
	
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<!--carousel-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!--carousel-->
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!-- Asi se vincula a la hoja de estilos -->	
</head>

<body>
	<nav id="top-nav">
		<div class="contenedor">
			<div class="fila">
			<ul class="menu-simple">
				<li><a href="#">Linkedin</a></li>
				<li><a href="#">Bumeran</a></li>
				<li><a href="#">CompuTrabajo</a></li>
			</ul>
			<ul class="menu-simple">
				<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
				<li><a href="#"><i class="fab fa-twitter"></i></a></li>
				<li><a href="#"><i class="fab fa-youtube"></i></a></li>
			</ul>	
			</div>
		</div><!-- contenedor -->
	</nav><!-- top-nav -->
	
	<header id="main-header">
		<div class="contenedor">
		<div class="fila">
		<h1>"JAZBA"</h1>
		<nav>
			<ul class="menu">
				<li><a href="#noticias">Noticias</a></li>
				<li><a href="#eventos">Eventos</a></li>
				<li><a href="#empresa">Empresas</a></li>
			
			</ul>
		</nav>		
		</div>		
		</div>
			
	</header><!-- main-header -->

	<div class="row">
<div class="col-md-2"></div>
<?php 
$i = 0;

echo '
	<div class="col-md-8" style="margin-top:100px; height:100%">
	<p id="postId" style="display:none">'.$postId.'</p>
				<div class="card mb-4 shadow-sm">
				<img src="data:image/png;base64,'.base64_encode($postimage).'" width="100%" height="500px"/>
					<div class="card-body">
					<h6>'.$postowner.'</h6>
					<h3 class="card-title">'.$posttitle.'</h3>
						<p class="card-text">'.$postdescription.'</p>
						<div style="float:right;">
							<small class="text-muted">Fecha de Posteo</small>
						</div>
					</div>
							<div class="card-header col-md-12">
								<h3>Comentarios</h3>
							</div>
';

foreach($postDetailIds as $postDetailId){
	echo '
			<div class="card-group row">
				<p class="detailId" style="display:none">'.$postDetailId.'</p>
				<p class="col-md-12">'.$comments[$i].'</p>
				<p class="col-md-6" style="font-size:14px">'.$dateTimes[$i].'</p>
				<div class="col-md-6"><button class="btn_like btn btn-primary"><i class="far fa-thumbs-up"></i></button><span class="num_likes" style="font-size:14px; margin-left:10px">'.$likes[$i].'</span></div>
			</div>
			
	';
	$i++;
}

echo' 	<script src="js/like.js"></script>
		<script src="js/comment.js"></script>';
	?>
				<textarea id="txt_comentario" placeholder="leave a comment..." style="height:200px;"></textarea>
				<div style="margin-left:75%"><button id="btn_comment" class="btn btn-primary w-100">Comentar</button>	</div>		
				</div>
	</div>
     <div class="col-md-2"></div>                
</div>   
		<footer id="main-footer">
		<div class="contenedor">
			<div class="fila">
				<div class="col25">
					<h4>"JAZBA" CORPORATION </h4>
				</div>
				<div class="col25">
					<h4>Contáctenos</h4>
					<p>Av. La fontana 435<br>
						La Molina - Lima - Perú<br>
						Teléfono:(051)-1321543<br>
						Correo electrónico: info@ideascreativas.pe
					</p>
				</div>
				<div class="col50">
					<h4>Información corporativa</h4>
					<div class="fila" id="footer-corporativo">
						<div class="col50">
							<h5>Oficinas</h5>
							<ul>
								<li>Lima</li>
								<li>Trujillo</li>
								<li>Iquitos</li>
							</ul>
						</div>
						<div class="col50">
							<h5>EXTRA</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore illum soluta aut enim ea beatae modi dicta repellat perferendis facere qui, cum architecto distinctio quas tempore? At quidem officia accusamus.</p>
						</div>				
					</div>
				</div>
			</div>
		</div>
	</footer><!-- main-footer -->
	
	
	
	<a href="../LOGIN Y REGISTRO/register/registration.html" id="irarriba"> ¡REGÍSTRATE AHORA! <i class="fas fa-chevron-up"></i></a>
	<script src="js/jquery-3.3.1.min.js"></script>
</body>
</html>