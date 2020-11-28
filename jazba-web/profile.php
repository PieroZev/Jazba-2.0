<<<<<<< HEAD
<!DOCTYPE html>
<?php
 
   include("config.php");
   session_start();

    $usuario = $_SESSION["login_user"];
    $postimages=[];
    $posttitles=[];
    $postdescriptions=[];
    $postowners=[];
    $postIds=[];
    
   if( $usuario != null) {
      // ejecuta la consulta al usuario
      
      $sql = "SELECT * from tbl_user U 
      inner join tbl_role R on U.id_role = R.id_role 
      inner join tbl_institucion I on U.id_institucion = I.id_institucion 
      inner join tbl_especialidad E on U.id_especialidad = E.id_especialidad 
      where U.username = '$usuario';";

      $sql .= "SELECT * from tbl_repoproyectos RP 
      inner join tbl_user US on US.DNI = RP.DNI 
      where US.username = '$usuario' ;";

      $nextResult = false;
      $nroQuery = 1;

      if ($db -> multi_query($sql)) {
        do {
          // Store first result set
          
            $result = mysqli_store_result($db);
            while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
              
              if($nroQuery==1){
              $mydni =          $row['DNI'];
              $mypassword =     $row['password']; 
              $myusername =     $row['username'];
              $myemail =        $row['email'];
              $myphone =        $row['phone'];
              $myfile =         $row['file'];  
              $isEnabled =      $row['is_enabled'];
              $idInstitucion =  $row['Nombre']; 
              $idRole =         $row['name']; 
              $idEspecialidad = $row['Descripcion']; 
              $lastnameFather = $row['last_name_father']; 
              $lastnameMother = $row['last_name_mother']; 
              }
              
              if($nroQuery>1){

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
      
      $db -> close();
      
   }
?>

<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Blog Template · Bootstrap</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Nuestro css-->
    <link href="css/blog.css" rel="stylesheet">

    <style>
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
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      
      <div class="col-4 text-center">
        <a  href="#"> <img src="img/logojazba-03-horizontal.png" height="70px" width="200px" alt="">  </a>
		  
      </div >
		<div class="blog-header-logo text-dark"> 
			
			<img src="img/36815619-confiado-guapo-retrato-de-hombre-joven-y-guapo-en-ropa-formal-mirando-a-la-cámara-mientras-está-de-pie-c.jpg" alt="" class="img-fluid rounded-circle" height="200px" width="150px">
		
		 </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
		  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <a class="text-muted" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
       
      </div>
    </div>
	   
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
		
      <a class="p-2 text-muted" href="#">World <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">U.S.  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Technology  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Design  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Culture  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Business  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Politics  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Opinion  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      
    </nav>
  </div>
		<br>
<div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">¿QUIÉN SOY?</strong>
          <h3 class="mb-0"><?php echo($myusername.' '.$lastnameFather.' '.$lastnameMother) ?></h3>
          <div id="mydni" class="mb-1">DNI: <?php echo($mydni) ?></div>
          <div class="mb-1">Email: <?php echo($myemail) ?></div>
          <div class="mb-1">Phone: <?php echo($myphone) ?></div>
          <div class="mb-1">Rol: <?php echo($idRole) ?></div>
        </div>
     	  
		  
		  
      </div>
    </div>
	
	<div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">¿POR QUÉ HAGO ESTO?</strong>
          <h3 class="mb-0">EVENTO MUNDIAL</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          
        </div>
     	  
		  
		  
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">ESTUDIOS SUPERIORES</strong>
          <h3 class="mb-0"><?php echo($idEspecialidad) ?></h3>
          <div class="mb-1"><?php echo($idInstitucion) ?></div>
        </div>
        
      </div>
    </div>
	 <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success"> OBJETIVO LABORAL</strong>
          <h3 class="mb-0">EVENTO DIGITAL(DISEÑO)</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          
        </div>
        
      </div>
    </div>
	  <div class="container"> </div>
</div>

<main class="container">
  <div class="row">
    
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        MI PORTAFOLIO 
      </h3>
    </div>
    <div class="row">
<?php
$i=0;

foreach($postimages as $image){

  echo ' 
<div class="card col-md-4">
    <div class="card-header">
      <h4 class="my-0 font-weight-normal" >'.$posttitles[$i].'</h4>
    </div>
    <div class="card-body">
          <div class="mb-1 text-muted">Fecha de Posteo</div>
            <p class="card-text mb-auto">'.$postdescriptions[$i].'</p>
          </div>
    <img src="data:image/png;base64,'.base64_encode($image).'" width="300px" height="200px"/>  
        </div>
   '  ;
  $i++;
}
?>

<div class="col-md-3"></div>
<div class="blog-pagination col-md-6" style="margin-top:100px;">
    <input id="post-title" class="form-control" type="text" placeholder="titulo" value=""/>
    <input id="upload" class="form-control" type="file" accept="image/*" value="Examinar" name="Examinar"/>
    <textarea id="txt_description" class="form-control" placeholder="leave a comment..." style="height:100px;"></textarea><br>
   <a class="btn btn-outline-primary" id="newProyect">Crear Proyecto</a>
</div>   
<div class="col-md-3"></div>


  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>
    </div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/create-proyect.js"></script>
</body>
=======
<!DOCTYPE html>
<?php
   include("config.php");
   session_start();

   $usuario = $_SESSION["login_user"];
   
   if( $usuario != null) {
      // ejecuta la consulta al usuario
      
      $sql = "SELECT * from tbl_user U 
      inner join tbl_role R on U.id_role = R.id_role 
      inner join tbl_institucion I on U.id_institucion = I.id_institucion 
      inner join tbl_especialidad E on U.id_especialidad = E.id_especialidad 
      where U.username = '$usuario';";

      $sql .= "SELECT * from tbl_repoproyectos RP 
      inner join tbl_user US on US.DNI = RP.DNI 
      where US.username = '$usuario' ;";

      $nextResult = false;
      $nroQuery = 1;

      if ($db -> multi_query($sql)) {
        do {
          // Store first result set
          
            $result = mysqli_store_result($db);
            while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
              
              if($nroQuery==1){
              $mydni =          $row['DNI'];
              $mypassword =     $row['password']; 
              $myusername =     $row['username'];
              $myemail =        $row['email'];
              $myphone =        $row['phone'];
              $myphoto =         $row['photo'];  
              $isEnabled =      $row['is_enabled'];
              $idInstitucion =  $row['Nombre']; 
              $idRole =         $row['name']; 
              $idEspecialidad = $row['Descripcion']; 
              $lastnameFather = $row['last_name_father']; 
              $lastnameMother = $row['last_name_mother']; 
              }
              
              if($nroQuery>1){

              $postname = $row['filename'];
              $postdescription = $row['Descripcion'];
              $postimage= $row['upload_repo'];
                
                /* $count = mysqli_num_rows($result);

                for($i=1;$i<$count;$i++){
                
                $postTitles       =     $row[0];
                $postDescriptions =     $row[1]; 
                $postImages       =     $row[2]; 
              }*/
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
      
      $db -> close();
      
   }
?>

<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Blog Template · Bootstrap</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Nuestro css-->
    <link href="css/blog.css" rel="stylesheet">

    <style>
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
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      
      <div class="col-4 text-center">
        <a  href="#"> <img src="img/logojazba-03-horizontal.png" height="70px" width="200px" alt="">  </a>
		  
      </div >
		<div class="blog-header-logo text-dark"> 
			
			<?php echo '<img src="data:image/png;base64,'.base64_encode($myphoto).'" alt="" class="img-fluid rounded-circle" height="200px" width="100px"> '?>
		
		 </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
		  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <a class="text-muted" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
       
      </div>
    </div>
	   
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
		
      <a class="p-2 text-muted" href="#">World <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">U.S.  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Technology  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Design  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Culture  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Business  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Politics  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      <a class="p-2 text-muted" href="#">Opinion  <img class ="p-2 text-muted" src="img/icono-portafolio.png" height="30px" alt=""></a>
      
    </nav>
  </div>
		<br>
<div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">¿QUIÉN SOY?</strong>
          <h3 class="mb-0"><?php echo($myusername.' '.$lastnameFather.' '.$lastnameMother) ?></h3>
          <div class="mb-1">DNI: <?php echo($mydni) ?></div>
          <div class="mb-1">Email: <?php echo($myemail) ?></div>
          <div class="mb-1">Phone: <?php echo($myphone) ?></div>
          <div class="mb-1">Rol: <?php echo($idRole) ?></div>
        </div>
     	  
		  
		  
      </div>
    </div>
	
	<div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">¿POR QUÉ HAGO ESTO?</strong>
          <h3 class="mb-0">EVENTO MUNDIAL</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          
        </div>
     	  
		  
		  
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">ESTUDIOS SUPERIORES</strong>
          <h3 class="mb-0"><?php echo($idEspecialidad) ?></h3>
          <div class="mb-1"><?php echo($idInstitucion) ?></div>
        </div>
        
      </div>
    </div>
	 <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success"> OBJETIVO LABORAL</strong>
          <h3 class="mb-0">EVENTO DIGITAL(DISEÑO)</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          
        </div>
        
      </div>
    </div>
	  <div class="container"> </div>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        MI PORTAFOLIO 
      </h3>

<?php


  echo ' <div class="card mb-4 shadow-sm">
  <div> 
 <div class="card-header">
   <h4 class="my-0 font-weight-normal" >'.$postname.'</h4>
 </div>
 <div class="card-body">
  <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
   <div class="col p-4 d-flex flex-column position-static">
     <div class="mb-1 text-muted">Nov 7</div>
     <p class="card-text mb-auto">'.$postdescription.'</p>
     

   </div>
   <div class="col-auto d-none d-lg-block">
   <img src="data:image/png;base64,'.base64_encode($postimage).'" width="300px" height="200px"/>
   </div>	  
 
 
 </div>
  <nav class="blog-pagination" align="right" >
    <textarea class="form-control" aria-label="With textarea">Describe tu proyecto ..</textarea><br>
   <a class="btn btn-outline-primary" href="#">Like :</a>
 </nav>
 
 </div>
    
  
</div>
  </div> '  ;


?>

       

      
    </div><!-- /.blog-main -->    <!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>
	  </div>
</body>
>>>>>>> 8c54ac8c31a64fca98e8b4bb5e261856e415463d
</html>