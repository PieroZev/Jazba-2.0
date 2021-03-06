
<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!--carousel-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!--carousel-->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Asi se vincula a la hoja de estilos -->

    <title>Jazba</title>

    <!-- Nuestro css-->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<nav id="top-nav">
    <div class="contenedor">
        <div class="fila">
            <ul class="menu-simple">
                <li><a href="https://www.linkedin.com/">Linkedin</a></li>
                <li><a href="https://www.bumeran.com.pe/">Bumeran</a></li>
                <li><a href="https://www.bumeran.com.pe/">CompuTrabajo</a></li>
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
                    <li><a href="posts.php">Posts</a></li>

                </ul>
            </nav>
        </div>
    </div>

</header><!-- main-header -->

<aside id="mensaje" class="padded">
    <div class="contenedor">
        <h2>MUÉSTRALE AL MUNDO LO QUE PUEDES HACER</h2>
        <p>«El trabajo en equipo es la habilidad de trabajar juntos con un objetivo en común. La habilidad de lograr logros personales relacionados con los objetivos empresariales. Es la gasolina que permite a la gente común lograr resultados no comunes”, Andrew Carnegie.</p>
    </div>
</aside><!-- mensaje -->

<section id="noticias" class="padded">
    <div class="contenedor">
        <header>
            <h2>USUARIOS</h2>
        </header>
        <div class="fila">
            <article class="col">
                <a href="login.php">  <i   class="fas fa-balance-scale" ></i> </a>
                <h3>MAESTRO</h3>
                <p>Lorem ipsum dolor sit amet,  elit. Dignissimos ducimus laborum quis error temporibus reprehenderit, natus quas accusantium esse modi! Vero sunt officia ullam, suscipit beatae ad expedita corporis quod.</p>
                <p>Optio quasi magni ipsum, consectetur perferendis temporibus beatae! Ea adipisci, itaque explicabo voluptatibus nemo iusto inventore magnam ab voluptatum architecto odio ullam, molestias numquam nobis quo, possimus debitis mollitia. Rem.</p>
            </article>
            <article class="col">
                <a href="login.php">   <i class="fas fa-chart-pie"></i> </a>
                <h3>ESTUDIANTE</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim dicta delectus voluptates molestiae perferendis ut vitae quod sunt nesciunt distinctio unde nisi, optio quisquam, pariatur quibusdam fuga.</p>
                <p>Deserunt temporibus quidem mollitia cumque recusandae illum neque voluptate natus aliquid similique ex hic ab doloribus voluptates culpa suscipit nihil, veniam, asperiores perspiciatis quibusdam impedit fuga fugit, nulla eveniet. Possimus.</p>
            </article>

        </div>
    </div>
</section><!-- noticias -->

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/1.jpg" class="d-block w-100"  height="100%"  width="100%">
        </div>
        <div class="carousel-item">
            <img src="img/administracion-carrera.jpg" class="d-block w-100"  height="100%" width="100%">
        </div>
        <div class="carousel-item">
            <img src="img/mira2.jpg" class="d-block w-100"  height="100%"  width="100%">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<section id="eventos" class="padded">
    <div class="contenedor">
        <!--(div>h3{Evento$}+(p>lipsum)*2)*3-->
        <header>
            <h2>Eventos</h2>
        </header>
        <div class="fila">
            <article class="col50">

                <h3><i class="fas fa-atom"></i> Evento1</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur repellat voluptatum at velit aliquid! Cum totam et deleniti esse, beatae aliquid. Velit ipsum reiciendis, facere quos quisquam sit vero nam!</p>
                <p>Laboriosam expedita, temporibus quibusdam fugiat odio obcaecati inventore optio veniam architecto eum natus deserunt quia, illum eos provident, itaque voluptatem cumque tenetur ab, enim officiis iusto adipisci! Perferendis, optio ipsum!</p>
                <ol start="15" type="I">
                    <li>Lima</li>
                    <li>Puno</li>
                    <li>Tacna</li>
                    <li>Ica</li>
                </ol>
            </article>
            <article class="col25">
                <h3><i class="fas fa-bell"></i> Evento2</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error harum dolores inventore obcaecati molestiae ipsa rem dolor et cum, fuga veritatis, ullam! Doloribus ab, at officiis quod neque impedit dolorem.</p>
                <p>Blanditiis tempora saepe, sequi accusamus dicta et nostrum ipsam exercitationem dolor id, ad maiores ipsa voluptatum ducimus non minus odio, nulla minima aliquid accusantium ullam. Ipsum cumque libero nostrum, sequi!</p>
            </article>
            <article class="col25">
                <h3><i class="fas fa-bicycle"></i> Evento3</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo architecto asperiores suscipit, tempora quibusdam! Eum similique dolorum autem! Sint modi saepe totam veniam doloremque vel accusantium dolores minus, ex porro.</p>
                <p>Aspernatur excepturi nobis quasi ipsam. Perspiciatis ad tempore quisquam quae, totam illo similique voluptas labore corrupti corporis vero et pariatur aliquam, eaque, sunt quibusdam voluptatibus atque velit reiciendis doloremque quasi.</p>
            </article>
        </div>
    </div>
</section><!-- eventos -->


<section id="galeria" class="padded">
    <div class="fila">
        <figure class="col16_66"><img  alt="" class="img-responsive"></figure>
        <figure class="col16_66"><img src="img/logo-universidad-tecnologica-del-peru.png" height="200PX" alt="" class="img-responsive"></figure>
        <figure class="col16_66"><img  alt="" class="img-responsive"></figure>
        <figure class="col16_66"><img src="img/logo-cibertec.png" height="200PX" alt="" class="img-responsive"></figure>
        <figure class="col16_66"><img  alt="" class="img-responsive"></figure>
        <figure class="col16_66"><img src="img/kaDQfYkw_400x400.jpg"  height="200PX" alt="" class="img-responsive"></figure>
        <figure class="col16_66"><img src="img/martinporres.jpg" height="200PX"  alt="" class="img-responsive"></figure>
        <figure class="col16_66"><img  alt="" class="img-responsive"></figure>
        <figure class="col16_66"><img src="img/logo_isil_principal.jpg" height="200PX" alt="" class="img-responsive"></figure>
        <figure class="col16_66"><img  alt="" class="img-responsive"></figure>
        <figure class="col16_66"><img src="img/descarga.png" height="200PX" alt="" class="img-responsive"></figure>
        <figure class="col16_66"><img  alt="" class="img-responsive"></figure>
    </div><!-- fila -->
</section><!-- galeria -->

<section id="empresa">
    <div class="contenedor">
        <div class="fila">
            <article class="col50 padded">
                <h2>Forge: El 38% de jóvenes peruanos no encuentra empleo por falta de experiencia</h2>

            </article>
            <figure class="col50 nopadding imagen-dato">
                <img src="img/unnamed.png" width="700px" >
                <figcaption><h4>ESTADÍSTICAS</h4><p>Redacción Gestión
                    Actualizado el 24/01/2018 a las 16:56 <br> <br>
                    La fundación Forge Perú elaboró un sondeo entre jóvenes de 18 a 24 años para conocer las condiciones y oportunidades de empleabilidad de este grupo de la población, así como las dificultades o trabas que encuentran al momento de buscar su primer empleo.
                    <br> <br>
                    Al tratarse de un primer empleo, los encuestados detallaron cuáles eran las principales dificultades o trabas que encuentran en el mercado laboral que les impiden obtener un puesto de trabajo, y en primer lugar se ubicó la falta de experiencia para el puesto.</p> </figcaption>
            </figure>
        </div>
    </div>
</section><!-- empresa -->
<div  align="center">

    <img src="img/ESTA.webp"   >
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



<a href="#" id="irarriba"><i class="fas fa-chevron-up"></i></a>
</body>
</html>
