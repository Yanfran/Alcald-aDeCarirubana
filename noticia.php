<?php
session_start();
include("./conexion/conexion.php");                        
$conexion=conexion();                           

    if (isset($_GET['id'])) {

        $sql="SELECT noticias.*, categoria_noticias.descripcion AS catego FROM noticias
        INNER JOIN categoria_noticias ON noticias.id_categoria = categoria_noticias.id 
        WHERE noticias.status = 1 && noticias.id='".$_GET['id']."' ";

        $result=mysqli_query($conexion,$sql);

        $fila=mysqli_fetch_array($result);
        if($fila==!''){
            
?>
        
        <?php include ("componentes/header.php"); ?>

        <!-- main header -->
            <?php include ("./componentes/menu.php"); ?>        
        <!-- main-header end -->


        <!-- Page Title -->
        <section class="page-title blog-page style-two" style="background-image: url(./img/inicio/banner_blog/banner-pequeno-1.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title centred">
                        <span class="category"><i class="flaticon-star"></i><?php echo $fila['catego']; ?></span>
                        <h1><?php echo $fila['titulo']; ?></h1>
                    </div>
                </div>
            </div>
            <div class="lower-box">
                <div class="auto-container">
                    <div class="post-content">
                        <div class="left-column">                            
                            <div class="post-date">
                                <h3>
                                    <?php echo date("d", strtotime($fila['fecha'])); ?>
                                    <span><?php echo date("m/Y", strtotime($fila['fecha'])) ?></span>
                                </h3>
                            </div>
                            <ul class="post-info clearfix">
                                <li>
                                    <i class="far fa-user"></i>
                                    Periodista:
                                    <a href="#">
                                        <?php echo $fila['periodista']; ?>                                            
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="right-column">
                            <div class="share-box" style="margin-right: 70px;">
                                <a href="blog-details.html">
                                    Compartir
                                </a>
                            </div>
                            <div 
                                class="team-block-one wow fadeInUp animated animated" 
                                data-wow-delay="00ms" 
                                data-wow-duration="1500ms" 
                                style="margin-top: -250px; margin-left: 110px; position: absolute;">
                                <div class="inner-box" style="background: transparent; box-shadow: none!important">
                                    <div class="lower-content">
                                        <ul class="othre-info clearfix" style="padding-top: 210px;">                     
                                            <li class="share-option" style="margin-left: 0px!important;">
                                                <i class="share-icon flaticon-share"></i>
                                                <ul class="share-links clearfix">
                                                    <li>
                                                        <a class="js-textareacopybtn">
                                                            <i class="fas fa-copy"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/intent/tweet?text=<?php echo $fila['titulo']; ?>&url=https://alcaldiadecarirubana.com/noticia.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?text=<?php echo $fila['titulo']; ?>%20https://alcaldiadecarirubana.com/noticia.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                                                            <i class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://alcaldiadecarirubana.com/noticia.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- sidebar-page-container -->
        <section class="sidebar-page-container sec-pad-2">
            <div class="auto-container">
                <input type="text" class="js-copytextarea" value="" style="display: block; background: #f5f5f6;color: #f5f5f6; position: absolute; margin-left: 20px;">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="inner-box">

                                 <!-- BANNER PRINCIPAL --> 
                                <section class="banner-section style-one mb-4">
                                    <div class="banner-carousel owl-theme owl-carousel owl-dots-none banner-noticias">
                                        <?php                                                                                           
                                            $sql="SELECT * FROM noticias_principales_imagenes WHERE status = 1 AND id_noticias='".$fila['id']."' ";
                                            $result=mysqli_query($conexion, $sql);                        
                                            while ($filaImage = mysqli_fetch_array($result)) {

                                        ?>                                    

                                        <div class="slide-item" >                                                                                                                            
                                            <div 
                                                class="image-layer" 
                                    style="background-image:url(./img/inicio/sesion_noticias_principales_img/<?php echo $filaImage['ruta']; ?>)">
                                                
                                            </div>
                                                    
                                        </div>    
                                            
                                        <?php } ?>
                                    </div>
                                </section>      
                                    <p style="font-weight: 800;">Fotógrafo: <?php echo $fila['fotografo']; ?></p>


                                    <div class="text descripcion">
                                        <p><?php echo $fila['descripcion']; ?></p>
                                    </div>
                            </div>
                            <!-- <div class="two-column">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image">
                                            <img src="assets-from/images/news/news-19.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image">
                                            <img src="assets-from/images/news/news-20.jpg" alt="">
                                            <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image" data-caption="">
                                                <i class="fas fa-link"></i>
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar">
                            <div class="search-widget">
                                <form action="noticia-search.php" method="GET" class="search-form">
                                    <div class="form-group">
                                        <input type="search" name="texto" placeholder="Buscar ..." required="">
                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="sidebar-widget category-widget">
                                <div class="widget-title">
                                    <h3>Filtrar Noticia</h3>
                                </div>
                                <div class="widget-content">                                     
                                    <form 
                                    style="margin-top: 10px; margin-bottom:-9px;" 
                                    action="noticia-search-date.php" 
                                    method="GET" 
                                    class="search-form">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group"
                                                style="border: solid #f2f2f2;padding: 6px;border-radius: 10px;">
                                                    <input type="text" style="background: transparent;" autocomplete="off" name="date1" placeholder="Fecha inicio" id="datepicker">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group"
                                                style="border: solid #f2f2f2;padding: 6px;border-radius: 10px;">
                                                    <input type="text" style="background: transparent;" autocomplete="off" name="date2" placeholder="Fecha fin" id="datepicker2">       
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                      <ul class="category-list clearfix">
                                                        <?php 
                                                            $sql2="SELECT * FROM categoria_noticias WHERE status = 1 ORDER BY id ASC";
                                                            $result2=mysqli_query($conexion, $sql2);                        
                                                            while ($fila2 = mysqli_fetch_array($result2)) {
                                                        ?>
                                                    <li>
                                                        
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="categoria" id="exampleRadios1" value="<?php echo $fila2['descripcion']; ?>" checked>
                                                          
                                                            <?php echo $fila2['descripcion']; ?>
                                                            <span style="position: absolute;right: 0px;"> 
                                                            <?php 
                                                                $sql3="SELECT COUNT(*) FROM noticias WHERE status = 1 && id_categoria ='".$fila2['id']."' ";
                                                                $result3=mysqli_query($conexion, $sql3);                        
                                                                $fila3 = mysqli_fetch_row($result3);
                                                                echo $fila3[0 ]
                                                            ?>
                                                            </span>

                                                        </div>
                                                        
                                                    </li>
                                                        <?php } ?>
                                                    </ul>
                                                
                                            </div>


                                            <div class="col-md-12 mb-4">
                                                <button class="btn btn-primary btn-block" type="submit" style="border-radius: 20px;">
                                                    <i class="far fa-search" style="right: 30px; top: 10px; font-size: 20px; color: white; position: absolute;"></i>
                                                    Buscar
                                                </button>
                                            </div>

                                        </div>                                        
                                    </form>
                                </div>
                            </div>                           
                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h3>Noticias Recientes</h3>
                                </div>
                                <div class="widget-content">
                                <?php 
                                    $sql2="SELECT * FROM noticias WHERE fecha = (SELECT MAX(fecha) FROM noticias) AND status = 1 ORDER BY id DESC LIMIT 3";
                                    $result2=mysqli_query($conexion, $sql2);                        
                                    while ($fila2 = mysqli_fetch_array($result2)) {
                                ?>
                                    <div class="post">
                                        <figure class="post-thumb">
                                            <a href="noticia.php?id=<?php echo $fila2['id']; ?>">
                                            <img src="./img/inicio/sesion_noticias_principales/<?php echo $fila2['ruta']; ?>" style="width: 70px; height: 70px;" alt="<?php echo $fila2['titulo']; ?>" loading="lazy">
                                            </a>
                                        </figure>
                                        <h6>
                                            <a href="noticia.php?id=<?php echo $fila2['id']; ?>">
                                            <?php echo $fila2['titulo']; ?>
                                            </a>
                                        </h6>
                                        <p>
                                            <i class="far fa-calendar"></i>
                                            <?php echo date("d/m/Y", strtotime($fila2['fecha'])); ?>
                                        </p>
                                    </div>                                    
                                <?php } ?>
                                </div>
                            </div>                     
                            <!-- <div class="sidebar-widget tags-widget">
                                <div class="widget-title">
                                    <h3>Popular Tags</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="tags-list clearfix">
                                        <li><a href="blog-details.html">Activities</a></li>
                                        <li><a href="blog-details.html">Certificates</a></li>
                                        <li><a href="blog-details.html">Culture</a></li>
                                        <li><a href="blog-details.html">Departments</a></li>
                                        <li><a href="blog-details.html">Drinks & Food</a></li>
                                        <li><a href="blog-details.html">Mayor</a></li>
                                        <li><a href="blog-details.html">Recreation</a></li>
                                        <li><a href="blog-details.html">Taxes & Bills</a></li>
                                        <li><a href="blog-details.html">Transport</a></li>
                                        <li><a href="blog-details.html">Utilities</a></li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- sidebar-page-container end -->


        <?php include ("./componentes/footer-2.php"); ?>

<?php 

        } else {
            header("Location: ./noticias.php");    
        }

    } else {
        header("Location: ./noticias.php");
    }
?>
