<?php
session_start();
include("./conexion/conexion.php");                        
$conexion=conexion();                           

    if (isset($_GET['id'])) {
    
        $sql="SELECT eventos.*, categoria_eventos.descripcion AS catego FROM eventos
        INNER JOIN categoria_eventos ON eventos.id_categoria = categoria_eventos.id 
        WHERE eventos.status = 1 && eventos.id='".$_GET['id']."' ";

        $result=mysqli_query($conexion,$sql);

        $fila=mysqli_fetch_array($result);
        if($fila==!''){
?>

        <?php include ("componentes/header.php"); ?>

        <!-- main header -->
            <?php include ("./componentes/menu.php"); ?>        
        <!-- main-header end -->

        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(./img/inicio/banner_blog/banner-pequeno-1.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title centred">
                        <span class="category"><i class="flaticon-star"></i><?php echo $fila['catego']; ?></span>
                        <h1><?php echo $fila['titulo']; ?></h1>
                    </div>
                </div>
            </div>
            <div class="team-block-one wow fadeInUp animated animated" 
                data-wow-delay="00ms" 
                data-wow-duration="1500ms" 
                style="margin-top: -250px; position: fixed; z-index: 100; right: 10px;">
                <div class="inner-box" style="background: transparent; box-shadow: none!important">
                    <div class="lower-content">
                        <ul class="othre-info clearfix" style="padding-top: 210px;">                     
                            <li class="share-option" style="margin-left: 0px!important; background: #fff!important;">
                                <i class="share-icon flaticon-share"></i>
                                <ul class="share-links clearfix">
                                    <li>
                                        <a class="js-textareacopybtn">
                                            <i class="fas fa-copy"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/intent/tweet?text=<?php echo $fila['titulo']; ?>&url=https://alcaldiadecarirubana.com/event-details.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://api.whatsapp.com/send?text=<?php echo $fila['titulo']; ?>%20https://alcaldiadecarirubana.com/event-details.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://alcaldiadecarirubana.com/event-details.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- event-details -->
        <section class="event-details">
            <div class="auto-container">
                <input type="text" class="js-copytextarea" value="" style="display: block; background: #f5f5f6;color: #f5f5f6; position: absolute; margin-left: 20px;">
                <div class="event-info">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-gps"></i></div>
                                <h4>Lugar del evento</h4>
                                <ul class="list clearfix"> 
                                    <li><i class="flaticon-gps"></i><?php echo $fila['ubicacion']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-calendar"></i></div>
                                <h4>Fecha y hora</h4>
                                <ul class="list clearfix"> 
                                    <li><i class="flaticon-calendar"></i><?php echo date("d-m-Y", strtotime($fila['fecha'])); ?></li>
                                    <li><i class="flaticon-clock-circular-outline"></i><?php echo date('h:i:a',strtotime($fila['hora'])); ?></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-emergency-call"></i></div>
                                <h4>Contáctanos</h4>
                                <ul class="list clearfix"> 
                                    <li><i class="flaticon-emergency-call"></i><a href="tel:4488812345"><?php echo $fila['telefono_organizador']; ?></a></li>
                                    <li><i class="flaticon-mail-inbox-app"></i><a href="mailto:info@example.com"><?php echo $fila['correo_organizador']; ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-businessman"></i></div>
                                <h4>Organizador</h4>
                                <ul class="list clearfix"> 
                                    <li>
                                        <i class="flaticon-businessman"></i><?php echo $fila['nombre_organizador']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overview-box">
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-12 col-sm-12 big-column">
                            <div class="image-box">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 image-column">
                                        <figure class="image"><img src="./img/inicio/sesion_eventos/<?php echo $fila['ruta']; ?>" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 text-column">
                            <div class="text descripcion">
                                <div class="group-title">
                                    <h4><?php echo $fila['titulo'] ?></h4>
                                    <div class="title-shape"></div>
                                </div>
                                <div class="text descripcion">
                                    <p><?php echo $fila['descripcion']; ?></p>
                                </div>
                                 <!-- <?php #echo $fila['descripcion'] ?> -->
                                <!-- <a href="event-details.html" class="theme-btn">+ Calendar</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="purpose-box">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 map-column">
                            <div class="map-inner">
                                <div 
                                    class="google-map" 
                                    id="contact-google-map" 
                                    data-map-lat="<?php echo $fila['latitud'] ?>" 
                                    data-map-lng="<?php echo $fila['longitud'] ?>" 
                                    data-icon-path="assets-from/images/icons/map-marker.png"  
                                    data-map-title="<?php echo $fila['ubicacion'] ?>" 
                                    data-map-zoom="12" 
                                    data-markers='{
                                        "marker-1": [40.712776, -74.005974, "<h4><?php echo $fila['ubicacion'] ?></h4>","assets-from/images/icons/map-marker.png"]
                                    }'>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- event-details end -->


        <!-- recent-events -->
        <section class="recent-events sec-pad">
            <div class="auto-container">
                <div class="group-title">
                    <h3>Recientes Eventos</h3>
                    <div class="title-shape"></div>
                </div>
                <div class="schedule-inner">

                    <?php 
                        $sql2="SELECT eventos.*, categoria_eventos.descripcion AS catego FROM eventos
                        INNER JOIN categoria_eventos ON eventos.id_categoria = categoria_eventos.id 
                        WHERE eventos.status = 1 ORDER BY eventos.id DESC LIMIT 3 ";
                        $result2=mysqli_query($conexion, $sql2);                        
                        while ($fila2 = mysqli_fetch_array($result2)) {
                    ?>

                    <div class="schedule-block-three">
                        <div class="inner-box">
                            <div class="inner">
                                <div class="schedule-date">


                                    <h2><?php echo date("d", strtotime($fila2['fecha'])); ?> 
                                        <span class="year">
                                            <?php echo date("m-Y", strtotime($fila2['fecha'])); ?> 
                                        </span>
                                        <span class="symple">th</span>
                                    </h2>
                                    <ul class="list clearfix"> 
                                        <li>
                                            <i class="flaticon-clock-circular-outline"></i>
                                            <?php echo date('h:i:a',strtotime($fila2['hora'])); ?>
                                        </li>
                                        <li><i class="flaticon-gps"></i><?php echo $fila2['ubicacion']; ?></li>
                                    </ul>
                                </div>
                                <div class="text">
                                    <span class="category"><i class="flaticon-star"></i><?php echo $fila['catego']; ?></span>
                                    <h3>
                                        <a href="event-details.php?id=<?php echo $fila2['id']; ?>">
                                            <?php echo $fila2['titulo']; ?>
                                        </a>
                                    </h3>
                                    <div class="link">
                                        <a href="event-details.php?id=<?php echo $fila2['id']; ?>">
                                            Ver Más
                                            <i class="flaticon-right-arrow"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>                    
                </div>
            </div>
        </section>
        <!-- recent-events end -->


        <?php include ("./componentes/footer-2.php"); ?>


<?php 

        } else {
            header("Location: ./noticias.php");    
        }

    } else {
        header("Location: ./noticias.php");
    }
?>
