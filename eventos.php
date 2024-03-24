<?php
session_start();
include("./conexion/conexion.php");                        
$conexion=conexion();                           
?>
        <?php include ("componentes/header.php"); ?>

        <!-- main header -->
            <?php include ("./componentes/menu.php"); ?>        
        <!-- main-header end -->


        <!-- Page Title -->
        <section class="page-title" style="background-image: url(./img/inicio/banner_blog/banner-pequeno-1.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title centred">
                        <h1>EVENTOS</h1>
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
                                        <a href="https://twitter.com/intent/tweet?text=Eventos&url=https://alcaldiadecarirubana.com/eventos.php" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://api.whatsapp.com/send?text=Eventos%20https://alcaldiadecarirubana.com/eventos.php" target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://alcaldiadecarirubana.com/eventos.php" target="_blank">
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


        <!-- events-list -->
        <section class="events-list sec-pad-2">
            <div class="auto-container">
                <input type="text" class="js-copytextarea" value="" style="display: block; background: #f5f5f6;color: #f5f5f6; position: absolute; margin-left: 20px;">
                <div class="event-list-content">
                    <div class="filter-box clearfix">
                        <form action="eventos-search.php" method="GET" class="search-form">
                            <div class="form-group">
                                <i class="flaticon-calendar"></i>
                                <input type="text" autocomplete="off" name="date1" placeholder="Fecha inicial" id="datepicker">
                            </div>
                            <div class="form-group">
                                <i class="flaticon-calendar"></i>
                                <input type="text" autocomplete="off" name="date2" placeholder="Fecha fin" id="datepicker2">
                            </div>
                            <div class="form-group">
                                <div class="select-box">
                                    <select class="wide" name="categoria" id="categorias">

                                        <?php
                                            $sql="SELECT * FROM categoria_eventos WHERE status=1";
                                            $result=mysqli_query($conexion, $sql);    
                                            while ($valores = mysqli_fetch_array($result)) {
                                            echo '<option value="'.$valores['descripcion'].'">'.$valores['descripcion'].'</option>';
                                          }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="search-btn">
                                <button type="submit" id="search">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row clearfix" style="position: sticky;">
                    <?php 
                        $limite = 6;
                        $totalQuery="SELECT COUNT(*) FROM eventos";
                        $resultNoticias=mysqli_query($conexion, $totalQuery);
                        $totalNoticias = mysqli_fetch_row($resultNoticias);
                        $totalBotones = round($totalNoticias[0] / $limite);
                        // die($totalBotones);   

                        if (isset($_GET['limite'])) {

                            $sql="SELECT eventos.*, categoria_eventos.descripcion AS catego FROM eventos
                            INNER JOIN categoria_eventos ON eventos.id_categoria = categoria_eventos.id 
                            WHERE eventos.status = 1 ORDER BY eventos.id DESC LIMIT ".$_GET['limite'].",".$limite." ";

                        } else {     

                            $sql="SELECT eventos.*, categoria_eventos.descripcion AS catego FROM eventos
                            INNER JOIN categoria_eventos ON eventos.id_categoria = categoria_eventos.id 
                            WHERE eventos.status = 1 ORDER BY eventos.id DESC LIMIT ".$limite." ";
                        }  

                        $result=mysqli_query($conexion, $sql);                        
                        while ($fila = mysqli_fetch_array($result)) {
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 schedule-block">
                        <div class="schedule-block-one">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="./img/inicio/sesion_eventos/<?php echo $fila['ruta']; ?>" alt="" loading="lazy"></figure>
                                    <div class="content-box">
                                        <div class="post-date">
                                            <h3>
                                                <?php echo date("d", strtotime($fila['fecha'])); ?> 
                                                <span>
                                                    <?php echo date("m-Y", strtotime($fila['fecha'])); ?> 
                                                </span>
                                            </h3>
                                        </div>
                                        <div class="text">
                                            <span class="category"><i class="flaticon-star"></i><?php echo $fila['catego'] ?></span>
                                            <h4><a href="event-details.php?id=<?php echo $fila['id']; ?>"><?php echo $fila['titulo']; ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <ul class="post-info clearfix">
                                        <li><i class="flaticon-clock-circular-outline"></i><?php echo $fila['hora'] ?></li>
                                        <li><i class="flaticon-gps"></i><?php echo $fila['ubicacion'] ?></li>
                                    </ul>
                                    <div class="links">
                                        <a href="event-details.php?id=<?php echo $fila['id']; ?>">
                                            Ver Más
                                            <i class="flaticon-right-arrow"></i>
                                        </a>
                                    </div>
                                    <!-- <div class="share-box"><a href="index.html">Share<i class="fas fa-share-alt"></i></a></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="pagination-wrapper centred">
                    <ul class="pagination clearfix">
                        <?php 

                            if (isset($_GET['limite'])) {
                                if ($_GET['limite'] > 0) {
                                    echo '<li>
                                            <a href="eventos.php?limite='.($_GET['limite']-6).'">
                                            <i class="far fa-angle-double-left"></i>
                                            </a>
                                        </li>';
                                }
                            }

                            for ($k=0; $k < $totalBotones ; $k++) { 
                                echo '<li><a href="eventos.php?limite='.($k*6).'">'.($k+1).'</a></li>';
                            }

                            if (isset($_GET['limite'])) {
                                if ($_GET['limite']+6 < $totalBotones*6) {
                                    echo '<li>
                                        <a href="eventos.php?limite='.($_GET['limite']+6).'">
                                            <i class="far fa-angle-double-right"></i>
                                        </a>
                                    </li>';    
                                }
                            } else {
                                echo '<li>
                                        <a href="eventos.php?limite=6">
                                            <i class="far fa-angle-double-right"></i>
                                        </a>
                                    </li>';
                            }

                        ?>
                        
                    </ul>
                </div>
            </div>
        </section>
        <!-- events-list end -->


        <?php include ("./componentes/footer-2.php"); ?>
