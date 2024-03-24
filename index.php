<?php
session_start();
include("./conexion/conexion.php");						
$conexion=conexion();
?>
<?php include ("./componentes/header.php") ?>
<style>
    .box-tramites {
        /*padding: 2em;*/
        /* width: 380px; */
    }
    .box-tramites a{
        display: -webkit-box!important;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
</style>
<!-- preloader -->
<div class="loader-wrap">
    <div class="preloader">
        <div class="preloader-close">Preloader Close</div>
        <div id="handle-preloader" class="handle-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="c" class="letters-loading">
                        C
                    </span>
                    <span data-text-preloader="a" class="letters-loading">
                        a
                    </span>
                    <span data-text-preloader="r" class="letters-loading">
                        r
                    </span>
                    <span data-text-preloader="i" class="letters-loading">
                        i
                    </span>
                    <span data-text-preloader="r" class="letters-loading">
                        r
                    </span>
                    <span data-text-preloader="u" class="letters-loading">
                        u
                    </span>
                    <span data-text-preloader="b" class="letters-loading">
                        b
                    </span>
                    <span data-text-preloader="a" class="letters-loading">
                        a
                    </span>
                    <span data-text-preloader="n" class="letters-loading">
                        n
                    </span>
                    <span data-text-preloader="a" class="letters-loading">
                        a
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- preloader end -->
<!-- search-popup -->
<div id="popup-emergente" class="popup-emergente">
    <div class="close-search"><span>Close</span></div>
    <div class="popup-inner">
        <div class="overlay-layer"></div>
        <div class="search-form">
            <img src="./assets-from/images/CPS.jpg" style="width:100%!important; height:50%!important;" alt="" loading="lazy">
        </div>
    </div>
</div>
<!-- popup emergente end -->
<!-- main header -->
<?php include ("./componentes/menu.php"); ?>
<!-- main-header end -->
<!-- BANNER PRINCIPAL -->
<section class="banner-section style-one">
    <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
        <?php											                        						
            $sql="SELECT * FROM banner WHERE status = 1 ";
            $result=mysqli_query($conexion, $sql);                        
            while ($fila = mysqli_fetch_array($result)) {
        ?>
        <div class="slide-item">
            <div class="image-layer"
                style="background-image:url(./img/inicio/banner_principal/<?php echo $fila['ruta']; ?>)"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h6><i class="flaticon-star"></i><?php echo $fila['categoria']; ?></h6>
                    <h1><?php echo $fila['titulo']; ?></h1>
                    <p><?php echo $fila['descripcion'] ?></p>
                    <?php if($fila['url']){ ?>
                    <div class="btn-box">
                        <a href="<?php echo $fila['url']; ?>" target="_blank" class="theme-btn">Leer Más</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<!-- BANNER PRINCIPAL END -->
<!-- MIN SERVICIOS -->
<section class="activities-section centred bg-color-1">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                    <a href="https://comercios.alcaldiadecarirubana.com" target="_blank">
                    <div class="single-item">
                        <div class="icon-box"><img src="assets-from/images/alcaldia/eventos/Consulta.png" loading="lazy"></div>
                        <h6>Menú Interactivo</h6>
                        <h4>Inteligencia de Negocios Municipales</h4>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                    <a href="https://empresas.alcaldiadecarirubana.com.ve/" target="_blank">
                    <div class="single-item">
                        <div class="icon-box"><img src="assets-from/images/alcaldia/eventos/nacimiento2.png" loading="lazy"></div>
                        <h6>Trámites de Empresas</h6>
                        <h4>Actividades Tributarias y Municipales</h4>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                    <a href="https://personas.alcaldiadecarirubana.com.ve/" target="_blank">
                    <div class="single-item">
                        <div class="icon-box"><i class="flaticon-taxes"></i></div>
                        <h6>Trámites de Personas</h6>
                        <h4>Actividades Tributarias y Municipales</h4>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                    <a href="https://fiscales.alcaldiadecarirubana.com" target="_blank">
                    <div class="single-item">
                        <div class="icon-box"><img src="assets-from/images/alcaldia/eventos/registro-en-linea.png" loading="lazy">
                        </div>
                        <h6>Verificación de Fiscales</h6>
                        <h4>Consulta de Funcionarios</h4>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MIN SERVICIOS END -->
<!-- BIENVENIDO A CARIRUBANA -->
<section class="about-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="row clearfix">
        <?php											                        						
            $sql="SELECT * FROM alcalde WHERE status = 1 ";
            $result=mysqli_query($conexion, $sql);                        
            while ($fila = mysqli_fetch_array($result)) {
		?>
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content_block_1">
                    <div class="content-box">
                        <div class="sec-title">
                            <h6><i class="flaticon-star"></i><span><?php echo $fila['categoria'] ?></span></h6>
                            <h2><?php echo $fila['titulo'];?></h2>
                            <div class="title-shape"></div>
                        </div>
                        <div class="text">
                            <h4><?php echo $fila['subtitulo'];?></h4>
                            <h5><?php echo $fila['descripcion'];?></h5>
                        </div>
                        <div class="inner-box clearfix">
                            <figure class="signature pull-left"><img
                                    src="assets-from/images/alcaldia/Firma-Abel-Negro.png" width="200px" alt="" loading="lazy"></figure>
                            <ul class="social-style-one clearfix">
                                <li><a href="https://twitter.com/soyabelpetit" target="_black"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/soyabelpetit" target="_black"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/soyabelpetit" target="_black"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="lower-box">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="solution-block-one">
                                        <a href="el-alcalde.php">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="flaticon-click"></i></div>
                                            <h4><?php echo $fila['etiqueta1']; ?></h4>
                                            <p>¡Conoce más de Abel Petit!</p>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="solution-block-one">
                                        <a href="la-alcaldia.php">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="flaticon-click"></i></div>
                                            <h4><?php echo $fila['etiqueta2']; ?></h4>
                                            <p>¡Saber más de la Alcaldia!</p>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div class="image_block_1">
                    <div class="image-box">
                        <figure class="image"><img
                                src="./img/inicio/sesion_carirubana/<?php echo $fila['ruta']; ?>" alt="" loading="lazy">
                        </figure>
                        <div class="text">
                            <h4><?php echo $fila['descripcion_ruta']; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- BIENVENIDO A CARIRUBANA END -->
<!-- TRAMITES Y SERVICIOS -->
<section class="service-style-two bg-color-4 mb-3">
    <div class="outer-container">
        <div class="bg-layer" style="background-image: url(assets-from/images/background/nueva-back/service-bg-2-azul.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                    <div class="content_block_2">
                        <div class="content-box">
                            <div class="sec-title light">
                                <h6><i class="flaticon-star"></i><span>TRÁMITES Y SERVICIOS</span></h6>
                                <h2>Pensando <br />en tu Beneficio</h2>
                                <div class="title-shape"></div>
                            </div>
                            <div class="text">
                                <p>Prestando un servicio acorde a las necesidades de las Comunidades.</p>
                                <a href="tramites_servicios.php" class="theme-btn style-two">Ver Más</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 inner-column"
                    style="background-image: url(assets-from/images/alcaldia/shape-1.png);">
                    <div class="inner-content centred">
                        <div class="four-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                            <?php											                        						
                            $sql="SELECT * FROM tramites WHERE status = 1 ORDER BY id DESC LIMIT 6";
                            $result=mysqli_query($conexion, $sql);                        
                            while ($fila = mysqli_fetch_array($result)) {
                        ?>
                            <div class="service-block-two">
                                <div class="inner-box">
                                    <div class="text">
                                        <h6><?php echo $fila['categoria']; ?></h6>
                                        <h4 class="box-tramites">
                                            <a href="tramites-detalles.php?id=<?php echo $fila['id']; ?>"
                                                id="contenedor"><?php echo $fila['titulo']; ?>
                                            </a>
                                        </h4>
                                        <div class="icon-box"><i class="<?php echo $fila['icono']; ?>"></i>
                                        </div>
                                    </div>
                                    <div class="link" >
                                        <a href="tramites-detalles.php?id=<?php echo $fila['id']; ?>">+</a>
                                    </div>
                                    <figure class="image-box">
                                        <img src="./img/inicio/tramites_servicios/<?php echo $fila['ruta']; ?>"
                                            alt="" loading="lazy">
                                    </figure>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- TRAMITES Y SERVICIOS END -->
<!-- DOCUMENTOS RECIENTES -->
<div class="explore-banner mt-5 mb-5">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 inner-column-campana">
                    <div class="inner-content centred">
                        <div class="campanas owl-carousel owl-theme owl-dots-none owl-nav-none">
                            <div class="service-block-two campana">
                                <div class="inner-box">
                                    <div class="text">
                                        <h6>Vértice</h6>
                                        <h4><a href="./assets-from/images/vertices/1-min.png" target="_black">Número</a></h4>
                                        <div class="icon-box" style="font-size: 20px; width: 40px; height: 40px;">
                                            <span style="margin-top: -24px; position: absolute;margin-left: -7px;">1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="service-block-two campana">
                                <div class="inner-box">
                                    <div class="text">
                                        <h6>Vértice</h6>
                                        <h4><a href="./assets-from/images/vertices/2-min.png" target="_black">Número</a></h4>
                                        <div class="icon-box" style="font-size: 20px; width: 40px; height: 40px;">
                                           <span style="margin-top: -24px; position: absolute;margin-left: -7px;">2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="service-block-two campana">
                                <div class="inner-box">
                                    <div class="text">
                                        <h6>Vértice</h6>
                                        <h4><a href="./assets-from/images/vertices/3-min.png" target="_black">Número</a></h4>
                                        <div class="icon-box" style="font-size: 20px; width: 40px; height: 40px;">
                                            <span style="margin-top: -24px; position: absolute;margin-left: -7px;">3</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="service-block-two campana">
                                <div class="inner-box">
                                    <div class="text">
                                        <h6>Vértice</h6>
                                        <h4><a href="./assets-from/images/vertices/4-min.png" target="_black">Número</a></h4>
                                        <div class="icon-box" style="font-size: 20px; width: 40px; height: 40px;">
                                            <span style="margin-top: -24px; position: absolute;margin-left: -7px;">4</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="service-block-two campana">
                                <div class="inner-box">
                                    <div class="text">
                                        <h6>Vértice</h6>
                                        <h4><a href="./assets-from/images/vertices/5-min.png" target="_black">Número</a></h4>
                                        <div class="icon-box" style="font-size: 20px; width: 40px; height: 40px;">
                                            <span style="margin-top: -24px; position: absolute;margin-left: -7px;">5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="service-block-two campana">
                                <div class="inner-box">
                                    <div class="text">
                                        <h6>Vértice</h6>
                                        <h4><a href="./assets-from/images/vertices/6-min.png" target="_black">Número</a></h4>
                                        <div class="icon-box" style="font-size: 20px; width: 40px; height: 40px;">
                                            <span style="margin-top: -24px; position: absolute;margin-left: -7px;">6</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="service-block-two campana">
                                <div class="inner-box">
                                    <div class="text">
                                        <h6>Vértice</h6>
                                        <h4><a href="./assets-from/images/vertices/7-min.png" target="_black">Número</a></h4>
                                        <div class="icon-box" style="font-size: 20px; width: 40px; height: 40px;"> <span style="margin-top: -24px; position: absolute;margin-left: -7px;">7</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 content-column-campana">
                        <div class="title-box" style="background: #e41e2f; padding: 44px;">
                            <h2 class="text-light" style="font-weight: 700">TE PRESENTAMOS</h2>
                            <p style="color: #fefefe;">Nuestro Plan de Gestión Municipal.</p>
                        </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- DOCUMENTOS RECIENTES END -->
<!-- NOTICIAS -->
<section class="news-section bg-color-1 mt-5">
    <div class="auto-container">
        <div class="sec-title centred">
            <h6><i class="flaticon-star"></i><span>Noticias</span><i class="flaticon-star"></i></h6>
            <h2>Noticias de Nuestro Municipio</h2>
            <div class="title-shape"></div>
        </div>
        <div class="row clearfix">
            <?php                                                                                           
        $sql="SELECT noticias.*, categoria_noticias.descripcion AS catego FROM noticias
        INNER JOIN categoria_noticias ON noticias.id_categoria = categoria_noticias.id WHERE noticias.status = 1 ORDER BY id DESC LIMIT 3 ";
        $result=mysqli_query($conexion, $sql);                        
        while ($fila = mysqli_fetch_array($result)) {
    ?>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="noticia.php?id=<?php echo $fila['id']; ?>"><i
                                        class="fas fa-link"></i></a>
                                <img src="./img/inicio/sesion_noticias_principales/<?php echo $fila['ruta']; ?>"
                                    alt="" loading="lazy">
                            </figure>
                            <div class="post-date">
                                <h3>
                                    <?php echo date("d", strtotime($fila['fecha'])); ?>
                                    <span><?php echo date("m/Y", strtotime($fila['fecha'])) ?></span>
                                </h3>
                            </div>
                        </div>
                        <div class="lower-content">
                            <div class="category">
                                <a href="noticia.php?id=<?php echo $fila['id']; ?>"><i
                                        class="flaticon-star"></i><?php echo $fila['catego']; ?>
                                </a>
                            </div>
                            <h4>
                                <a href="noticia.php?id=<?php echo $fila['id']; ?>"><?php echo $fila['titulo']; ?>
                                </a>
                            </h4>
                            <ul class="post-info clearfix">
                                <li>
                                    <i class="far fa-user"></i>
                                    <a href="noticia.php?id=<?php echo $fila['id']; ?>"><?php echo $fila['periodista']; ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- NOTICIAS END -->
<!-- CONOCIENDO CARIRUBANA -->
<section class="explore-style-two bg-color-4 sec-pad pb-140 centred">
    <div id="particles-js" class="particles"></div>
    <div class="vector-image" style="background-image: url(assets-from/images/shape/shape-2.png);"></div>
    <div class="auto-container">
        <div class="sec-title centred">
            <h6><i class="flaticon-star"></i><span>Turismo</span><i class="flaticon-star"></i></h6>
            <h2 class="text-light">Inspiración Para su Próximo Viaje</h2>
            <div class="title-shape"></div>
        </div>
        <div class="four-item-carousel owl-carousel owl-theme owl-nav-none">
            <?php                                                                                           
                $sql="SELECT * FROM categoria_conociendo_carirubana WHERE status = 1";
                $result=mysqli_query($conexion, $sql);                        
                while ($fila = mysqli_fetch_array($result)) {
            ?>
            <div class="explore-block-two">
                <div class="inner-box">
                    <figure class="image-box">
                        <img src="./img/inicio/categoria_img/<?php echo $fila['ruta']; ?>" alt="" loading="lazy">
                    </figure>
                    <div class="content-box">
                        <div class="icon-box"><i class="<?php echo $fila['icono']; ?>"></i></div>
                        <h4><?php echo $fila['descripcion']; ?></h4>
                    </div>
                    <div class="overlay-content">
                        <div class="icon-box"><i class="<?php echo $fila['icono']; ?>"></i></div>
                        <!-- <p><?php echo $fila['descripcion']; ?></p> -->
                        <div class="text">
                            <h4><?php echo $fila['descripcion']; ?></h4>
                            <a href="turismo.php">Leer Más</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- CONOCIENDO CARIRUBANA END -->
<!-- MULTIMEDIA -->
<section class="service-section bg-color-1">
    <div class="explore-banner">
        <div class="auto-container">
            <div class="sec-title centred">
                <h6><i class="flaticon-star"></i><span>Multimedia</span><i class="flaticon-star"></i></h6>
                <h2>Documentos Recientes</h2>
                <div class="title-shape"></div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 award-block">
                    <div class="award-block-one">
                        <div class="inner-box">
                            <figure class="award-box">
                                <div class="bg-pattern"
                                    style="background-image: url(assets-from/images/icons/icon-bg-1.png);"></div>
                                <img src="assets-from/images/alcaldia/eventos/ordenaza2.png" alt="" loading="lazy">
                            </figure>
                            <h4>Ordenanzas</h4>
                            <div class="overlay-content">
                                <div class="bg-pattern-2" style="background: #FF9921;"></div>
                                <h4>Ordenanzas</h4>
                                <p class="text-light">
                                    Ordenanzas
                                </p>
                                <a href="ordenanzas.php">Ver Más<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 award-block">
                    <div class="award-block-one">
                        <div class="inner-box">
                            <figure class="award-box">
                                <div class="bg-pattern"
                                    style="background-image: url(assets-from/images/icons/icon-bg-1.png);"></div>
                                <img src="assets-from/images/alcaldia/eventos/semanario.png" alt="" loading="lazy">
                            </figure>
                            <h4>Semanario</h4>
                            <div class="overlay-content">
                                <div class="bg-pattern-2" style="background: #EC4A5F"></div>
                                <h4>Semanario</h4>
                                <p class="text-light">
                                    Semanarios
                                </p>
                                <a href="semanario.php">Ver Más<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 award-block">
                    <div class="award-block-one">
                        <div class="inner-box">
                            <figure class="award-box">
                                <div class="bg-pattern"
                                    style="background-image: url(assets-from/images/icons/icon-bg-1.png);"></div>
                                <img src="assets-from/images/alcaldia/eventos/revista2.png" alt="" loading="lazy">
                            </figure>
                            <h4>Reportaje</h4>
                            <div class="overlay-content">
                                <div class="bg-pattern-2" style="background: #7BD3DD;"></div>
                                <h4>Reportaje</h4>
                                <p class="text-light">
                                    Reportaje
                                </p>
                                <a href="libros_revistas.php">Ver Más<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MULTIMEDIA END -->
<!-- EVENTOS -->
<section class="schedules-style-two"
    style="background-image: url(assets-from/images/background/nueva-back/schedule-bg-22.png);">
    <div class="layer-bg" style="background-image: url(assets-from/images/background/nueva-back/layer-bg-3-azul.png);"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content_block_3">
                    <div class="content-box">
                        <h6 class="text-light mb-3 ml-1 font-weight-bold" style="margin-top: -50px!important;">
                            <i class="flaticon-star"></i> <span>EVENTOS</span></h6>
                        <h4><i class="flaticon-romantic-date"></i>Descubre lo que está pasando <br />en el
                            Municipio</h4>
                        <h2>No te pierdas las actividades que promueve la Alcaldía</h2>
                        <div class="btn-box"><a href="eventos.php" class="theme-btn style-two">Ver Más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="inner-content">
                    <div class="schedule-carousel">
                        <?php                  
                            $sql="SELECT eventos.*, categoria_eventos.descripcion AS catego FROM eventos
                            INNER JOIN categoria_eventos ON eventos.id_categoria = categoria_eventos.id WHERE eventos.status = 1 ORDER BY id DESC LIMIT 3 ";
                            $result=mysqli_query($conexion, $sql);                        
                            while ($fila = mysqli_fetch_array($result)) {
                        ?>
                        <div class="schedule-block-two">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img
                                            src="./img/inicio/sesion_eventos/<?php echo $fila['ruta']; ?>"
                                            alt="" loading="lazy"></figure>
                                    <div class="text">
                                        <div class="category">
                                            <p><i class="flaticon-star"></i><?php echo $fila['catego']; ?></p>
                                        </div>
                                        <h3>
                                            <a
                                                href="event-details.php?id=<?php echo $fila['id']; ?>"><?php echo $fila['titulo']; ?></a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="date">
                                        <h3>
                                            <?php echo date("d", strtotime($fila['fecha'])); ?>
                                            <span><?php echo date("m/Y", strtotime($fila['fecha'])) ?></span>
                                        </h3>
                                    </div>
                                    <ul class="post-info clearfix">
                                        <li>
                                            <i class="flaticon-clock-circular-outline"></i>
                                            <?php echo $fila['hora']; ?>
                                        </li>
                                        <li><i class="flaticon-gps"></i><?php echo $fila['ubicacion']; ?></li>
                                    </ul>
                                    <div class="icon-box"><i class="flaticon-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- EVENTOS END -->
<!-- ENTES DESCENTRALIZADOS -->
<section class="service-section" style="background-image: url(assets-from/images/background/nueva-back/service-bg11.png);">
    <div class="auto-container">
        <div class="row clearfix">
            <?php                                                     
                $sql="SELECT * FROM entes WHERE status = 1 ORDER BY id DESC LIMIT 1 ";
                $result=mysqli_query($conexion, $sql);                        
                while ($fila = mysqli_fetch_array($result)) {
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInLeft animated animated" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <h4><a href="entes-detalles.php?id=<?php echo $fila['id']; ?>"><?php echo $fila['titulo']; ?></a></h4>
                        <div class="btn-box"><a href="entes-detalles.php?id=<?php echo $fila['id']; ?>">Ver
                                Más</a></div>
                        <div class="icon-box"><i class="<?php echo $fila['icono']; ?>"></i></div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-lg-6 col-md-6 col-sm-12 title-column">
                <div class="sec-title centred">
                    <div class="sec-title centred">
                        <h6><i class="flaticon-star"></i><span>Entes</span><i class="flaticon-star"></i>
                        </h6>
                        <h2>Entes Descentralizados</h2>
                        <div class="title-shape"></div>
                        <a href="entes.php" class="links">Todos los Entes<i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <?php                                                     
                $sql="SELECT * FROM entes WHERE status = 1 ORDER BY id DESC LIMIT 1,5 ";
                $result=mysqli_query($conexion, $sql);                        
                while ($fila = mysqli_fetch_array($result)) {
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="200ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <h4><a href="entes-detalles.php?id=<?php echo $fila['id']; ?>"><?php echo $fila['titulo']; ?></a></h4>
                        <div class="btn-box"><a href="entes-detalles.php?id=<?php echo $fila['id']; ?>">Ver
                                Más</a></div>
                        <div class="icon-box"><i class="<?php echo $fila['icono'] ?>"></i></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- ENTES DESCENTRALIZADOS END --> 
<section class="funfact-section" style="background: white!important;">
    <div class="pattern-layer" style="background-image: url(assets-from/images/shape/shape-7.png);"></div>
    <div class="auto-container">
        <div class="funfact-content">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                    <div class="sec-title">
                        <h6><i class="flaticon-star"></i><span>Municipio en Números</span></h6>
                        <h2>Municipio en Números</h2>
                        <div class="title-shape"></div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                    <div class="funfact-inner centred">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                <div class="funfact-block-one">
                                    <div class="inner-box">
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="1500" data-stop="250">0</span><span>k</span>
                                        </div>
                                        <h6>Números Habitantes</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                <div class="funfact-block-one">
                                    <div class="inner-box">
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="1500" data-stop="700">0</span>
                                        </div>
                                        <h6>Casos Sociales Atendidos</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                <div class="funfact-block-one">
                                    <div class="inner-box">
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="1500" data-stop="300">0</span><span></span>
                                        </div>
                                        <h6>Proyectos Ejecutados</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                <div class="funfact-block-one">
                                    <div class="inner-box">
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="1500" data-stop="50">0</span><span></span>
                                        </div>
                                        <h6>Alianzas Estratégicas</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="twitter-feed" style="position: relative; margin-bottom: -200px; z-index: 1;">
            <div class="inner-content clearfix">
                <div class="single-item" style="margin-bottom: -70px;">
                    <div class="title-box centred" style="margin-bottom: -70px!important; 
                                padding-top: 200px!important; padding-bottom: 255px!important;">
                        <div class="pattern" style="background-image: url(assets-from/images/shape/shape-6.png);">
                        </div>
                        <div class="icon-box"><i class="fab fa-instagram"></i></div>
                        <h4>Alcaldía @alcarirubana</h4>
                        <a href="https://www.instagram.com/alcarirubana?lang=es" target="_blank">Síguenos</a>
                    </div>
                </div>
                <div class="single-item">
                    <div class="inner-box">
                        <!-- <div class="text"> -->

                        <div
                        style="margin-top: -60px; height: 625px;"
                        loading="lazy"
                        data-mc-src="474fbb75-0211-4424-94e4-9adf29a2a57f#instagram"></div>
                                
                        <script 
                        src="https://cdn2.woxo.tech/a.js#634dd30d967df3a439343596" 
                        async data-usrc>
                        </script>

                        <!-- <a class="twitter-timeline" data-width="360" data-height="500" href="https://twitter.com/soyabelpetit?ref_src=twsrc%5Etfw">
                            Tweets by soyabelpetit
                        </a> 
                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> -->
                            
                        <!-- </div> -->
                    </div>
                </div>
                <div class="single-item centred">
                    
                        <div class="efemerides owl-carousel owl-theme owl-dots-none">
                            <?php                                                                                           
                                $sql="SELECT * FROM efemerides WHERE status = 1 ORDER BY id DESC LIMIT 6";
                                $result=mysqli_query($conexion, $sql);                        
                                while ($fila = mysqli_fetch_array($result)) {
                            ?>
                            <div class="row clearfix">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                    <div class="image-box">
                                        <figure class="image"><img src="assets/images/resource/highlights-1.png" alt=""></figure>
                                        <div class="icon-box"><i class="flaticon-cocktail"></i></div>
                                    </div>
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12 text-column">
                                <figure class="image-box" style="justify-content: center; display: flex;margin-top: 50px;">
                                    <img style="border-radius: 10px;" src="./img/inicio/efemerides/<?php echo $fila['ruta']; ?>" alt="" loading="lazy">
                                </figure>
                                <a href="<?php echo $fila['url']; ?>" target="_blank">
                                    <div class="text">
                                        <h3><?php echo $fila['titulo']; ?></h3>
                                        <p><?php echo $fila['descripcion']; ?></p>
                                        <!-- <ul class="list clearfix">
                                            <li><i class="flaticon-bird"></i>Administrative Practices</li>
                                            <li><i class="flaticon-bird"></i>Carry out the Duties</li>
                                            <li><i class="flaticon-bird"></i>Develop the Municipaity</li>
                                            <li><i class="flaticon-bird"></i>Maintain Financial Integrity</li>
                                            <li><i class="flaticon-bird"></i>Represent the Public</li>
                                        </ul> -->
                                        <!-- <a href="index.html">Pubs & Clubs Venues<i class="flaticon-right-arrow"></i></a> -->
                                    </div>
                                </a>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>     
<?php include ("./componentes/footer.php"); ?>
<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fas fa-angle-up"></span>
</button>
</div>
<!-- jequery plugins -->
<script src="assets-from/js/jquery.js"></script>
<script src="assets-from/js/popper.min.js"></script>
<script src="assets-from/js/bootstrap.min.js"></script>
<script src="assets-from/js/owl-min.js"></script>
<script src="assets-from/js/wow.js"></script>
<script src="assets-from/js/validation.js"></script>
<script src="assets-from/js/jquery.fancybox-min.js"></script>
<script src="assets-from/js/appear-min.js"></script>
<script src="assets-from/js/scrollbar.js"></script>
<script src="assets-from/js/jquery.nice-select.min.js"></script>
<script src="assets-from/js/nav-tool.js"></script>
<script src="assets-from/js/bxslider-min.js"></script>
<script src="assets-from/js/particles.min.js"></script>
<script src="assets-from/js/app-min.js"></script>

<!-- main-js -->
<!-- <script src="assets-from/popup.js"></script> -->
<script src="assets-from/js/script-min.js"></script>
<script>
    var hoy = new Date();
    var fecha = hoy.getDate() + '-' + ( hoy.getMonth() + 1 ) + '-' + hoy.getFullYear();
    var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
    var fechaYHora = fecha + ' ' + hora;
    //Obteniendo una variable con la máscara d-m-Y H:i:s
    console.log(fechaYHora);
    const a = document.getElementById("fecha-cabecera");
    a.textContent = fechaYHora;

</script>

</body>

</html>