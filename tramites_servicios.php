<?php
session_start();
include("./conexion/conexion.php");                        
$conexion=conexion();   
$sql="SELECT * FROM tramites WHERE status=1";
$row=mysqli_query($conexion, $sql);    
?>

        <?php include ("componentes/header.php"); ?>
        <style>
            .box {
              background-color: #fff;
              /*box-shadow: 2px 2px 10px #246756;*/
              /*padding: 2em;*/
              width: 380px;
            }

            .box p {
              display: -webkit-box;
              -webkit-line-clamp: 1;
              -webkit-box-orient: vertical;  
              overflow: hidden;
            }
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
        <!-- main header -->
            <?php include ("./componentes/menu.php"); ?>        
        <!-- main-header end -->

        <!-- Page Title -->
        <section class="page-title blog-page style-two" style="background-image: url(./img/inicio/banner_blog/banner-pequeno-1.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title centred">
                        <h1>TRÁMITES Y SERVICIOS</h1>
                    </div>
                </div>
            </div>
            <div class="lower-box">
                <div class="auto-container">
                    <div class="post-content">
                        <div class="left-column">                            
                        </div>
                        <div class="right-column">
                            <div class="share-box" style="margin-right: 70px;">
                                <a href="#">
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
                                                        <a class="js-textareacopybtn" href="#">
                                                            <i class="fas fa-copy"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/intent/tweet?text=Tramites y Servicios&url=https://alcaldiadecarirubana.com/tramites_servicios.php" target="_blank">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?text=Tramites y Servicios%20https://alcaldiadecarirubana.com/tramites_servicios.php" target="_blank">
                                                            <i class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://alcaldiadecarirubana.com/tramites_servicios.php" target="_blank">
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


        <!-- about-style-four -->
        <section class="about-style-four sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_6">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h6><i class="flaticon-star"></i><span>Optimizando los Servicios</span></h6>
                                    <h2>Mejorando la calidad</Ca> <br />de vida</h2>
                                    <div class="title-shape"></div>
                                </div>
                                <div class="text">
                                    <p>
                                        La alcaldía dentro de sus vértices presenta el camino que facilita la atención y el desarrollo del Municipio Carirubana, que apoye la correcta formulación de proyectos y que permitan avanzar hacia una EcoTecnoCiudad con una oferta de servicios innovadores para que la administración de la Alcaldía atienda las necesidades de todos los ciudadanos.
                                    </p>
                                </div>
                                <div class="inner-box clearfix">
                                    <div class="left-column pull-left">
                                        <div class="single-item">
                                            <div class="icon-box"><i class="flaticon-double-tick-indicator"></i></div>
                                            <h6>Servicios Para</h6>
                                            <h4>Los Residentes Del Municipio</h4>
                                        </div>
                                        <div class="single-item">
                                            <div class="icon-box"><i class="flaticon-double-tick-indicator"></i></div>
                                            <h6>Servicios Para</h6>
                                            <h4>Los Visitantes del Municipio</h4>
                                        </div>
                                    </div>
                                    <div class="right-column pull-right">
                                        <div class="text">
                                            <p>Trámites y servicios de la Alcaldía de Carirubana</p>
                                        </div>
                                        <div class="text">
                                            <p>Soluciones Inmediatas Para Todos</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="btn-box">
                                    <a href="service.html">Read More</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <input type="text" class="js-copytextarea" value="" style="display: block; background: #f5f5f6;color: #f5f5f6; position: absolute; margin-left: 20px;">
                        <div class="content_block_7">
                            <div class="content-box">
                                <div class="left-column">
                                    <div class="inner centred">
                                        <div class="icon-box"><i class="flaticon-building-1"></i></div>
                                        <h6>Servicios Para</h6>
                                        <h4>Los Residentes Del Municipio</h4>
                                    </div>
                                    <ul class="list clearfix">
                                        <li>e-Censos</li>
                                        <li>Identidad Municipal</li>
                                        <li>Etiqueta Inteligente</li>
                                        <li>Servicios Públicos</li>
                                        <li>APP Carirubana</li>
                                    </ul>
                                </div>
                                <div class="right-column">
                                    <figure class="image-box">
                                        <img src="assets-from/images/simbolos-patrios/Servicios.png" alt="" loading="lazy">
                                        <!-- <a href="service.html"><i class="fal fa-angle-left"></i></a> -->
                                    </figure>
                                    <div class="inner centred">
                                        <div class="icon-box"><i class="flaticon-tourist"></i></div>
                                        <h6>Servicios Para</h6>
                                        <h4>Los Visitantes del Municipio</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-four end -->


        <!-- service-style-two -->
        <section class="service-style-two bg-color-3 centred sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h6><i class="flaticon-star"></i><span>Nuestros Servicios</span><i class="flaticon-star"></i></h6>
                    <h2>TRÁMITES Y SERVICIOS</h2>
                    <div class="title-shape"></div>
                </div>
                <div class="four-item-carousel owl-carousel owl-theme owl-dots-none">

                    <?php 
                        foreach ($row as $resultado):  
                    ?>

                    <div class="service-block-two">
                        <div class="inner-box">
                            <div class="text">
                                <h6><?php echo $resultado['categoria']; ?></h6>
                                <h4 class="box-tramites">
                                    <a href="tramites-detalles.php?id=<?php echo $resultado['id']; ?>"><?php echo $resultado['titulo']; ?>
                                    </a>
                                </h4>
                                <div class="icon-box"><i class="<?php echo $resultado['icono']; ?>"></i></div>
                            </div>
                            <div class="link"><a href="tramites-detalles.php?id=<?php echo $resultado['id']; ?>">+</a></div>
                            <figure class="image-box"><img src="./img/inicio/tramites_servicios/<?php echo $resultado['ruta']; ?>" alt="" loading="lazy"></figure>
                        </div>
                    </div>
                    
                    <?php endforeach; ?>

                </div>
            </div>
        </section>
        <!-- service-style-two end -->


        <!-- solutions-section -->
        <section class="solutions-section alternat-2 mb-5">
            <div class="auto-container">
                <div class="sec-title centred light">
                    <h6><i class="flaticon-star"></i><span>TRÁMITES Y SERVICIOS EN LÍNEA </span><i class="flaticon-star"></i></h6>
                    <h2>Soluciones Inmediatas Para Todos</h2>
                    <div class="title-shape"></div>
                </div>
                <div class="inner-container mr-0">
                    <div class="upper-box clearfix">
                        <div class="solution-block-one">
                            <a href="https://empresas.alcaldiadecarirubana.com.ve/" target="_blank">
                                <div class="inner-box box">
                                    <div class="icon-box"><i class="flaticon-click"></i></div>
                                    <h4>Empresas</h4>
                                    <p>Actividades Tributarias y Solicitudes Municipales</p>
                                </div>
                            </a>
                        </div>
                        <div class="solution-block-one">
                            <a href="https://personas.alcaldiadecarirubana.com.ve/" target="_blank">
                                <div class="inner-box box">
                                    <div class="icon-box"><i class="flaticon-click"></i></div>
                                    <h4>Personas</h4>
                                    <p>Actividades Tributarias y Solicitudes Municipales</p>
                                </div>
                            </a>
                        </div>
                        <div class="solution-block-one">
                            <a href="https://alcaldiadecarirubana.com.ve/tramites_empresas/certificado.php" target="_blank">
                                <div class="inner-box box">
                                    <div class="icon-box"><i class="flaticon-click"></i></div>
                                    <h4>Consultar Certificado</h4>
                                    <p>Consultar Certificación Electrónica</p>
                                </div>
                            </a>
                        </div>
                        <div class="solution-block-one">
                            <a href="https://alcaldiadecarirubana.com.ve/consultar_empresas/index.html" target="_blank">
                                <div class="inner-box box">
                                    <div class="icon-box"><i class="flaticon-click"></i></div>
                                    <h4>Consultar Empresa</h4>
                                    <p>Verificación de Registros de Empresas</p>
                                </div>
                            </a>
                        </div>
                        <div class="solution-block-one">
                            <a href="http://capacitacion.alcaldiadecarirubana.com" target="_blank">
                                <div class="inner-box box">
                                    <div class="icon-box"><i class="flaticon-click"></i></div>
                                    <h4>Capacitación Rentas</h4>
                                    <p>Cursos de Capacitación SIGESP</p>
                                </div>
                            </a>
                        </div>
                        <div class="solution-block-one">
                            <a href="https://fiscales.alcaldiadecarirubana.com" target="_blank">
                                <div class="inner-box box">
                                    <div class="icon-box"><i class="flaticon-click"></i></div>
                                    <h4>Verificación de Fiscales</h4>
                                    <p>Fiscales Autorizados</p>
                                </div>
                            </a>
                        </div>
                        <div class="solution-block-one">
                            <a href="https://comercios.alcaldiadecarirubana.com" target="_blank">
                                <div class="inner-box box">
                                    <div class="icon-box"><i class="flaticon-click"></i></div>
                                    <h4>Menú BIM</h4>
                                    <p>Menú interactivo</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="lower-box clearfix">
                        <div class="bg-layer" style="background-image: url(assets-from/images/shape/shape-7.png);"></div>
                        <div class="text pull-left">
                            <div class="icon-box"><i class="flaticon-idea"></i></div>
                            <h5 style="color: #fff;">
                                "El poder de la conciencia de un pueblo, la conciencia de un colectivo, es el más poderoso instrumento unitario indestructible, unidad alimentada por la conciencia".
                            </h5>
                            <p>Hugo Chávez. 23FEB12</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- solutions-section end -->



        <?php include ("./componentes/footer-2.php"); ?>
