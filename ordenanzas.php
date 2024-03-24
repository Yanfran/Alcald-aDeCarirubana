<?php
session_start();
include("./conexion/conexion.php");                        
$conexion=conexion();   
?>
        
        <?php include ("componentes/header.php"); ?>

        <style>
            #search-container {
              margin: 1em 0;
            }
            #search-container input {
              background-color: transparent;
              width: 40%;
              border-bottom: 2px solid #110f29;
              padding: 1em 0.3em;
            }
            #search-container input:focus {
              border-bottom-color: #6759ff;
            }
            #search-container button {
              padding: 1em 2em;
              margin-left: 1em;
              background-color: #6759ff;
              color: #ffffff;
              border-radius: 5px;
              margin-top: 0.5em;
            }

            .card {
              background-color: #ffffff;
              max-width: 18em;
              margin-top: 1em;
              padding: 1em;
              border-radius: 5px;
              box-shadow: 1em 2em 2.5em rgba(1, 2, 68, 0.08);
            }

            .hide {
              display: none;
            }

           
            .box {
              background-color: #fff;
              /*box-shadow: 2px 2px 10px #246756;*/
              /*padding: 2em;*/
              width: 380px;
            }

            .box p {
              display: -webkit-box;
              -webkit-line-clamp: 2;
              -webkit-box-orient: vertical;  
              overflow: hidden;
            }

            @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
                .box{
                    width: 230px;
                }
            }
        </style>

        <!-- main header -->
            <?php include ("./componentes/menu.php"); ?>        
        <!-- main-header end -->


        <!-- Page Title -->
        <section class="page-title blog-page style-two" style="background-image: url(./img/inicio/banner_blog/banner-pequeno-1.jpg">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title centred">
                        <h1>Ordenanzas</h1>
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
                                                        <a class="js-textareacopybtn" href="#">
                                                            <i class="fas fa-copy"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/intent/tweet?text=Ordenanzas&url=https://alcaldiadecarirubana.com/ordenanzas.php" target="_blank">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?text=Ordenanzas%20https://alcaldiadecarirubana.com/ordenanzas.php" target="_blank">
                                                            <i class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://alcaldiadecarirubana.com/ordenanzas.php" target="_blank">
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


        <!-- download-section -->
        <section class="download-section" style="background-image: url(assets-from/images/background/service-bg11.jpg);">

            <!-- <div class="layer-bg" style="background-image: url(assets-from/images/background/layer-bg-2.jpg);"></div> -->
            <div class="auto-container">
                <input type="text" class="js-copytextarea" value="" style="display: block; background: transparent;color: transparent; position: absolute; margin-left: 20px;">
                <div class="wrapper mb-5" style="position: relative; left: 10px;">
                    <div id="search-container">
                        <input type="search" id="myinput" placeholder="Buscar..."/>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status" id="spinner" style="display: none;">
                            <!-- <span class="visually-hidden">Loading...</span> -->
                        </div>
                    </div>

                    <!-- <div id="buttons">
                        <button class="button-value" onclick="filterProduct('all')">All</button>
                        <button class="button-value" onclick="filterProduct('Topwear')">Topwear</button>
                        <button class="button-value" onclick="filterProduct('Bottomwear')">Bottomwear</button>
                        <button class="button-value" onclick="filterProduct('Jacket')">Jacket</button>
                        <button class="button-value" onclick="filterProduct('Watch')">Watch</button>
                    </div> -->
                </div>
                <h3 class="text-danger mt-5 text-center" id="para" style="display: none;">Not Found </h3>
                <div class="row clearfix" id="card">
                </div>
            </div>
        </section>
        <!-- download-section end -->

        <!-- DOCUMENTOS RECIENTES -->
        <div class="explore-banner mt-5 sec-pad-2">
            <div class="auto-container">
                 <div class="lower-box">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12 single-column">
                            <div class="solution-block-one">
                                <a href="semanario.php">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-click"></i></div>
                                    <h4>Semanario</h4>
                                    <p>¡Conoce más de Abel Petit!</p>
                                </div>
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 single-column">
                            <div class="solution-block-one">
                                <a href="libros_revistas.php">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-click"></i></div>
                                    <h4>Reportaje</h4>
                                    <p>¡Saber más de la Alcaldia!</p>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 single-column">
                            <div class="solution-block-one">
                                <a href="ordenanzas.php">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-click"></i></div>
                                    <h4>Ordenanzas</h4>
                                    <p>¡Saber más de la Alcaldia!</p>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- DOCUMENTOS RECIENTES END -->


        <?php include ("./componentes/footer-2.php"); ?>
        <script src="assets-from/js/ordenanzas.js"></script>
