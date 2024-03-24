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
            <div class="auto-container">
                <div class="content-box">
                    <div class="title centred">
                        <h1>ENTES DESCENTRALIZADOS</h1>
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
                                                        <a href="https://twitter.com/intent/tweet?text=Entes%20Descentralizados&url=https://alcaldiadecarirubana.com/entes.php" target="_blank">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <!-- <li><a href="index.html"><i class="fab fa-instagram"></i></a></li> -->
                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?text=Entes%20Descentralizados%20https://alcaldiadecarirubana.com/entes.php" target="_blank">
                                                            <i class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://alcaldiadecarirubana.com/entes.php" target="_blank">
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

        <section class="service-section" style="background-image: url(assets-from/images/background/service-bg11.jpg);">
            <div class="auto-container">
                <input type="text" class="js-copytextarea" value="" style="display: block; background: #f5f5f6;color: #f5f5f6; position: absolute; margin-left: 20px;">
                <div class="funfact-content">
                    <div class="row clearfix">

                        <?php               
                            $limite = 8;
                            $totalQuery="SELECT COUNT(*) FROM entes";
                            $resultNoticias=mysqli_query($conexion, $totalQuery);
                            $totalNoticias = mysqli_fetch_row($resultNoticias);
                            $totalBotones = round($totalNoticias[0] / $limite);

                            if (isset($_GET['limite'])) {

                                $sql="SELECT * FROM entes WHERE status = 1 ORDER BY id DESC LIMIT ".$_GET['limite'].",".$limite." ";
                            } else {

                                $sql="SELECT * FROM entes WHERE status = 1 ORDER BY id DESC LIMIT ".$limite." ";
                            }  

                            $result=mysqli_query($conexion, $sql);                        
                            while ($fila = mysqli_fetch_array($result)) {
                        ?> 

                        <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                            <div class="service-block-one wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <h4><a href="entes-detalles.php?id=<?php echo $fila['id']; ?>"><?php echo $fila['titulo']; ?></a></h4>
                                    <div class="btn-box"><a href="entes-detalles.php?id=<?php echo $fila['id']; ?>">Ver Más</a></div>
                                    <div class="icon-box"><i class="<?php echo $fila['icono']; ?>"></i></div>
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
                                                <a href="entes.php?limite='.($_GET['limite']-8).'">
                                                <i class="far fa-angle-double-left"></i>
                                                </a>
                                            </li>';
                                    }
                                }

                                for ($k=0; $k < $totalBotones ; $k++) { 
                                    echo '<li><a href="entes.php?limite='.($k*8).'">'.($k+1).'</a></li>';
                                }

                                if (isset($_GET['limite'])) {
                                    if ($_GET['limite']+8 < $totalBotones*8) {
                                        echo '<li>
                                            <a href="entes.php?limite='.($_GET['limite']+8).'">
                                                <i class="far fa-angle-double-right"></i>
                                            </a>
                                        </li>';    
                                    }
                                } else {
                                    echo '<li>
                                            <a href="entes.php?limite=8">
                                                <i class="far fa-angle-double-right"></i>
                                            </a>
                                        </li>';
                                }

                            ?>
                        </ul>
                    </div>               
                </div>
            </div>
        </section>


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

    <script src="./app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="./app-assets/js/scripts/extensions/ext-component-toastr.js"></script>

    <!-- main-js -->
    <!-- <script src="assets-from/js/script.js"></script> -->
    <script>
        var URLactual = window.location;
        // alert(URLactual);

        $(".js-copytextarea").val(URLactual);

        var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

        copyTextareaBtn.addEventListener('click', function(event) {
          var copyTextarea = document.querySelector('.js-copytextarea');
          copyTextarea.focus();
          copyTextarea.select();

          try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Copying text command was ' + msg);

            toastr["success"](
                "👋 Su enlace ha sido copiado con éxito!",
                "Success!",
                {
                  positionClass: 'toast-bottom-right',
                  closeButton: true,
                  tapToDismiss: false,
                  progressBar: true,
                }
              );

          } catch (err) {
            console.log('Oops, unable to copy');
          }
        });
    </script>

</body><!-- End of .page_wrapper -->
</html>
