<?php 
include("config.php");


$usuario = null;

session_start();

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log('.json_encode($output, JSON_HEX_TAG).');';
    if ($with_script_tags) {
        $js_code = '<script>'.$js_code.'</script>';
    }
    echo $js_code;
}

try{
    if ($_SESSION["login_user"]==null){
        $usuario = "visitante";
    }else{
        $usuario = $_SESSION["login_user"];
    }
}catch(Exception $e){

    console_log($e);
}finally{
    console_log("code works!");
}


$postimages=[];
$posttitles=[];
$postdescriptions=[];
$postowners=[];
$postIds=[];

if( $usuario != null) {
   // ejecuta la consulta al usuario

   $sql = "SELECT * from tbl_repoproyectos RP 
   inner join tbl_user US on US.DNI = RP.DNI ORDER BY RP.id_repositorio DESC";

   $nextResult = false;

   if ($db -> multi_query($sql)) {
     do {
       // Store first result set
       
         $result = mysqli_store_result($db);
         while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
            
            $i = 0;

            foreach($result as $row){

                $postIds[$i] = $row['id_repositorio'];
                $posttitles[$i] = $row['filename'];
                $postdescriptions[$i] = $row['Descripcion'];
                $postimages[$i]= $row['upload_repo'];
                $postowners[$i] = $row['username'].' '.$row['last_name_father'].' '.$row['last_name_mother'];

                $i++;
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

        //Prepare next result set
     } while ($nextResult);
   }
   
   $db -> close();
   
}
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
    
    <style>
.card{
margin-top:100px;
}
</style>
<h2 style="text-align:center; margin-top:100px; margin-bottom:-50px">
Bienvenido <?php echo $usuario ?>!
</h2>
	<div class="album py-5 bg-light">
		<div class="container">

			<div class="row">
            
<?php

$i=0;

foreach($postimages as $image){

echo ('

<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="data:image/png;base64,'.base64_encode($image).'" alt="Card image cap" height="225px" width="100%">
                        <div class="card-body">
                            <p class="card-text">'.$postowners[$i].'</p>
                            <h5 class="card-title">'.$posttitles[$i].'</h5>
							<p class="card-text">'.$postdescriptions[$i].'</p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<a href="post-detail.php?postId='.$postIds[$i].'" class="btn btn-sm btn-outline-secondary">View</a>
									<a href="post-detail.php?postId='.$postIds[$i].'" class="btn btn-sm btn-outline-secondary">Edit</a>
								</div>
								<small class="text-muted">9 mins</small>
							</div>
						</div>
					</div>
				</div>
');

$i++;

}
?>
</div>
    </div>
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
</body>
</html>








