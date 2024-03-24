<?php
session_start();
include("./conexion/conexion.php");                        
$conexion=conexion();                                       
?>
        

        <?php include ("componentes/header.php"); ?>

        <?php include ("componentes/menu.php"); ?>

        <!-- Page Title -->
        <section class="page-title blog-page style-two" style="background-image: url(./img/inicio/banner_blog/banner-pequeno-1.jpg">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title centred">
                        <h1>CONTACTO</h1>
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
                                                        <a href="https://twitter.com/intent/tweet?text=Contacto&url=https://alcaldiadecarirubana.com/contacto.php" target="_blank">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <!-- <li><a href="index.html"><i class="fab fa-instagram"></i></a></li> -->
                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?text=Contacto%20https://alcaldiadecarirubana.com/contacto.php" target="_blank">
                                                            <i class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://alcaldiadecarirubana.com/contacto.php" target="_blank">
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


        <!-- contact-information -->
        <section class="contact-information">
            <div class="auto-container">
                <input type="text" class="js-copytextarea" value="" style="display: block; background: #f5f5f6;color: #f5f5f6; position: absolute; margin-left: 20px;">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 content-column">
                        <div class="content_block_12">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h6><i class="flaticon-star"></i><span>CONTACTO</span></h6>
                                    <h2>Información de Contacto</h2>
                                    <div class="title-shape"></div>
                                </div>
                                <div class="text">
                                    <p>Entendemos que es importante que usted acceda a nuestros servicios de manera oportuna</p>
                                    <h4><i class="flaticon-map-1"></i>Dirección</h4>
                                    <p style="margin-left: 60px;">Avenida Rafael González entre Av. Los Caobos y Las Acacias Punto Fijo Estado Falcón</p>
                                    <!-- <a href="contact.html">Get Direction<i class="flaticon-right-arrow"></i></a> -->
                                </div>
                                <div class="social-box">
                                    <h4>Redes Sociales</h4>
                                    <ul class="social-style-one clearfix">
                                        <li><a href="contact.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.facebook.com/abelpetit74" target="_black"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.instagram.com/soyabelpetit" target="_black"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 image-column">
                        <figure class="image-box"><img src="assets-from/images/contacto/contacto-min.jpg" alt=""></figure>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                        <div class="content_block_13">
                            <div class="content-box">
                                <div class="single-item">
                                    <div class="icon-box"><i class="flaticon-mail-inbox-app"></i></div>
                                    <ul class="info clearfix">
                                        <li>
                                            <h5>Correo</h5>
                                            <p style="font-size: 12px;">
                                                <a href="mailto:contacto@alcaldiadecarirubana.com">contacto@alcaldiadecarirubana.com</a>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-item">
                                    <div class="icon-box"><i class="flaticon-emergency-call"></i></div>
                                    <ul class="info clearfix">
                                        <li>
                                            <h5>Teléfono</h5>
                                            <p><a href="tel:5802692458511">+58 (0269) 2458511</a></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-item">
                                    <div class="icon-box"><i class="flaticon-clock"></i></div>
                                    <ul class="info clearfix">
                                        <li>
                                            <h5>Lunes - Viernes</h5>
                                            <p>8.00 am to 4.00 pm</p>
                                        </li>
                                        <!-- <li>
                                            <h5>Saturday</h5>
                                            <p>10.30 am to 4.15 pm</p>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-information end -->


        <!-- contact-style-two -->
        <section class="contact-style-two" style="margin-top: -40px;">
            <div class="auto-container">
                <div class="form-inner">
                    <div class="sec-title centred">
                        <h6><i class="flaticon-star"></i><span>Encuéntranos Aquí</span><i class="flaticon-star"></i></h6>
                        <h2>Ubicación</h2>
                        <div class="title-shape"></div>
                        <!-- <p>Fill out this form to send your inquires or complaints to Whitehall City Government.</p> -->
                    </div>
                </div>
                <div class="map-inner mb-4" style="margin-top: -70px;">
                    <div 
                        class="google-map" 
                        id="contact-google-map" 
                        data-map-lat="11.695326973891165" 
                        data-map-lng="-70.19585746175454" 
                        data-icon-path="assets-from/images/icons/map-marker.png"  
                        data-map-title="Brooklyn, New York, United Kingdom" 
                        data-map-zoom="18" 
                        data-markers='{
                            "marker-1": [11.695326973891165, -70.19585746175454, "<h4>Branch Office</h4><p>77/99 New York</p>","assets-from/images/icons/map-marker.png"]
                        }'>


                    </div>
                </div>
            </div>
        </section>
        <!-- contact-style-two end -->


        <?php include ("componentes/footer-2.php"); ?>


