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
        <section class="page-title blog-page style-two" style="background-image: url(./img/inicio/banner_blog/banner-pequeno-1.jpg);">
            <div class="auto-container pb-4">
                <div class="content-box">
                    <div class="title centred">
                        <!-- <span class="category"><i class="flaticon-star"></i>Education</span> -->
                        <h1>ALCALDE ABEL PETIT</h1>
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
                                                        <a href="https://twitter.com/intent/tweet?text=El%20Alcalde&url=https://alcaldiadecarirubana.com/el-alcalde.php" target="_blank">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <!-- <li><a href="index.html"><i class="fab fa-instagram"></i></a></li> -->
                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?text=El%20Alcalde%20https://alcaldiadecarirubana.com/el-alcalde.php" target="_blank">
                                                            <i class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://alcaldiadecarirubana.com/el-alcalde.php" target="_blank">
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
                                    <h6><i class="flaticon-star"></i><span>El Alcalde</span></h6>
                                    <h2><?php echo $fila['titulo'];?></h2>
                                    <div class="title-shape"></div>
                                </div>
                                <div class="text">
                                    <!-- <h5>We denounce with righteous indignation and dislike men who are so beguiled demoralized charms of pleasure.</h5> -->
                                    <h4><?php echo $fila['subtitulo'];?></h4>
                                    <!-- <h5>Como bolivarianos y bolivarianas tenemos la tarea cotidiana de alimentar la conciencia y el espíritu revolucionario para la transformación de una sociedad más justa y humana, con miras al futuro próspero de nuestro Municipio. Todo lo que hacemos es por amor a Venezuela.</h5> -->
                                    <h5><?php echo $fila['descripcion'];?></h5>
                                    <!-- <p>When our power of choice is untrammelled when nothing prevents our being able to do what we like best, every pleasure is to be welcomed every pain get avoided. But in certain circumstances owing.</p> -->
                                </div>
                                <div class="inner-box clearfix">
                                    <figure class="signature pull-left"><img src="assets-from/images/alcaldia/Firma-Abel-Negro.png" width="200px" alt="" loading="lazy"></figure>
                                    <ul class="social-style-one clearfix">
                                        <li><a href="https://twitter.com/soyabelpetit" target="_black"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.facebook.com/soyabelpetit" target="_black"" target="_black"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.instagram.com/soyabelpetit" target="_black"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_1">
                            <div class="image-box">
                                <figure class="image"><img src="./img/inicio/sesion_carirubana/<?php echo $fila['ruta']; ?>" alt="" loading="lazy"></figure>
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


        <!-- sidebar-page-container -->
        <section class="sidebar-page-container mt--5 mb-4">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="inner-box">
                                <!-- <figure class="image-box"><img src="assets-from/images/news/news-18.jpg" alt=""></figure> -->
                                <div class="text">
                                    <h5 style="position: relative;
                                        display: block;
                                        font-size: 18px;
                                        line-height: 28px;
                                        font-weight: 500;
                                        margin-bottom: 24px;">


                                        <h5 class="mb-3">
                                            ABEL PETIT FLORES Alcalde del 
                                            municipio Carirubana, estado Falcón, 
                                            República Bolivariana de Venezuela.
                                            Durante su trayectoria social y política se 
                                            ha desempeñado como:
                                        </h5>

                                        <ul style="margin-left:50px">
                                            <li>
                                                <h5>
                                                Concejal del 
                                                Partido Socialista Unido de Venezuela, 
                                                PSUV, en el Concejo Municipal de 
                                                Carirubana (2013-2018).
                                                </h5>
                                            </li>
                                            <li>
                                                <h5>
                                                Presidente del 
                                                Concejo Municipal de Carirubana (2015-
                                                2018).
                                                </h5>
                                            </li>
                                            <li>
                                                <h5>
                                                Diputado del PSUV al Consejo 
                                                Legislativo del estado Falcón por el circuito 
                                                Carirubana - Los Taques (2018-2021).
                                                </h5>
                                            </li>
                                            <li>
                                                <h5>
                                                Autoridad Única del Deporte en el estado 
                                                Falcón y Presidente de la Fundación para el 
                                                Desarrollo del Deporte en Falcón, 
                                                FUNDEFAL, (Febrero - Agosto 2021).
                                                </h5>
                                            </li>
                                            <li>
                                                <h5>
                                                Hijo, 
                                                padre y esposo, comprometido con el amor 
                                                a su pueblo.
                                                </h5>
                                            </li>
                                            <li>
                                                <h5>
                                                Seguidor de Dios y su palabra.
                                                </h5>
                                            </li>
                                        </ul>
                                    </h5>    
                                </div>
                                
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->

        <!-- about-department -->
        <section class="about-department sec-pad-2" style="margin-top: -170px;">
            <div class="auto-container">
                <input type="text" class="js-copytextarea" value="" style="display: block; background: transparent;color: transparent; position: absolute; margin-left: 20px;">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 image-column" style="margin-top: 100px; margin-bottom: -50px;">
                        <figure class="image-box"><img src="./assets-from/images/el-alcalde/abel1-min.jpg" alt="" loading="lazy"></figure>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 image-column" style="margin-top: 100px; margin-bottom: -50px;">
                        <figure class="image-box"><img src="./assets-from/images/el-alcalde/Abel2-min.jpg" alt="" loading="lazy"></figure>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 image-column" style="margin-top: 100px; margin-bottom: -50px;">
                        <figure class="image-box"><img src="./assets-from/images/el-alcalde/Abel3-min.jpg" alt="" loading="lazy"></figure>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-department end -->

        <?php include ("./componentes/footer-2.php"); ?>



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fas fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="assets-from/js/jquery.js"></script>
    <script src="assets-from/js/popper.min.js"></script>
    <script src="assets-from/js/bootstrap.min.js"></script>
    <script src="assets-from/js/owl.js"></script>
    <script src="assets-from/js/wow.js"></script>
    <script src="assets-from/js/validation.js"></script>
    <script src="assets-from/js/jquery.fancybox.js"></script>
    <script src="assets-from/js/appear.js"></script>
    <script src="assets-from/js/scrollbar.js"></script>
    <script src="assets-from/js/jquery.nice-select.min.js"></script>
    <script src="assets-from/js/nav-tool.js"></script>
    <script src="assets-from/js/isotope.js"></script>
    <script src="assets-from/js/jquery-ui.js"></script>
    <script src="assets-from/js/timePicker.js"></script>
    
    <!-- map script -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script> -->
    <!-- <script src="assets-from/js/gmaps.js"></script> -->
    <!-- <script src="assets-from/js/map-helper.js"></script> -->

    <!-- main-js -->
    <!-- <script src="assets-from/js/script.js"></script> -->

</body><!-- End of .page_wrapper -->
</html>
