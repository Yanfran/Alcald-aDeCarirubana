<?php
session_start();
include("./conexion/conexion.php");                     
$conexion=conexion();                           
?>

        <?php include ("componentes/header.php"); ?>


        <?php include ("componentes/menu.php"); ?>


        <!-- Page Title -->
        <section class="page-title blog-page style-two" style="background-image: url(assets-from/images/alcaldia/graficas/home1-min.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title centred">
                        <h1>ANÁLISIS DE GESTIÓN TRIBUTARIA</h1>
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
                                                        <a href="https://twitter.com/intent/tweet?text=Transparencia&url=https://alcaldiadecarirubana.com/transparencia.php" target="_blank">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?text=Transparencia%20https://alcaldiadecarirubana.com/transparencia.php" target="_blank">
                                                            <i class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://alcaldiadecarirubana.com/transparencia.php" target="_blank">
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
                <input type="text" class="js-copytextarea" value="" style="display: block; background: transparent;color: transparent; position: absolute; margin-left: 20px;">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                        <div class="content_block_6">
                            <div class="content-box">                                

                                <iframe 
                                src="https://datastudio.google.com/embed/reporting/e43753b7-4fd8-427e-af7e-bd78726121a4/page/ILg6C" 
                                style="border:0" 
                                allowfullscreen="" 
                                width="100%" 
                                height="800" 
                                frameborder="0">
                                </iframe>
                                

                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </section>
        <!-- about-style-four end -->

        <?php include ("componentes/footer-2.php"); ?>
